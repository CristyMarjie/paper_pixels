<?php

namespace App\Http\Controllers;

use App\Models\MasterContract;
use App\Models\MasterTenant;
use App\Models\Notice;
use App\Models\Tenant;
use App\Traits\NoticeTrait;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Support\Facades\Storage;
use NumberFormatter;
use Illuminate\Support\Str;
class NoticeController extends Controller
{

    use ResponseApi,NoticeTrait;



    public function getNotices()
    {
        $auth_id =  Auth::user()->tenants()->get()->toArray();
        return Notice::where('tenant_id',$auth_id[0]['id'])->orderBy('created_at','desc')->get();
    }


    public function noticeDetails($noticeId)
    {

        $notice =  Notice::with('tenant.master_tenant')->findOrFail($noticeId);


        $contract = MasterContract::where('lease_number',$notice->tenant->master_tenant->lease_number)->firstOrFail();

        $owner = \explode(',',$contract->owner);

        $notice->owner = trim($owner[0]);

        $notice->position = trim($owner[1] ?? '');

        $notice->address = $contract->address;

        $notice->lessee = $contract->lessee;

        $notice->location = $contract->location;

        $notice->amount = $this->numberToText($notice->notice_details->balance);


        return view('pages.partials.notifications.notification_details',['notice' =>$notice]);
    }

    public function addNoticeView()
    {
        return view('pages.notices.add_notices',[
            'tenants' => Tenant::with('master_tenant')->has('master_tenant')->get()
        ]);
    }

    public function tenantContracts($leaseNumber){
        return MasterContract::where('lease_number',$leaseNumber)->get();
    }

    public function store(Request $request)
    {
        try{
            if(!in_array($request->notice_type,[Notice::FIRST_NOTICE,Notice::SECOND_NOTICE,Notice::THIRD_NOTICE,Notice::TURNOVER_NOTICE])) throw new Exception('Notice type not found',404);


            $contract = MasterContract::with('tenant.additional.user')->where('lease_number',$request->tenant)->firstOrFail();

            $dompdf = new Dompdf();

            $dompdf->getOptions()->setChroot(public_path());

            switch($request->notice_type){
                case Notice::FIRST_NOTICE:
                        $notice= $this->firstNotice($contract,$dompdf,$request);
                    break;
                case Notice::SECOND_NOTICE:
                        $notice = $this->secondNotice($contract,$dompdf,$request);
                    break;
                case Notice::THIRD_NOTICE:
                        $notice = $this->thirdNotice($contract,$dompdf,$request);
                    break;
                case Notice::TURNOVER_NOTICE:
                        $notice = $this->takeoverNotice($contract,$dompdf,$request);
                    break;
                default:
                    throw new Exception('Notice type not found',404);
                    break;
            }

            return $notice;

        }catch(Exception $e){
            return $this->error($e->getMessage(),$e->getCode());
        }
    }


    public function downloadNotice($id)
    {
        $notice = Notice::findOrFail($id);

        if(!Storage::exists($notice->path)) abort(404);

        return Storage::download($notice->path);
    }

    function numberToText($number) {
        $digit = new NumberFormatter('en', NumberFormatter::SPELLOUT);
        $numberParts = explode('.', (string) round($number,3));
        $formatedNumber =  $digit->format($numberParts[0]);
        if (isset($numberParts[1])){
          $formatedNumber .= ' and ' . $digit->format($numberParts[1]) . ' '.Str::plural('cent', $numberParts[1]);
        }
        return ucwords($formatedNumber).' Pesos';
      }


}
