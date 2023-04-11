<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\SoaImport;
use App\Models\StatementOfAccount;
use App\Traits\ResponseApi;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StatementOfAccountController extends Controller
{
    use ResponseApi;

    public function createStatementOfAccount(Request $request,$id)
    {
        try{
        DB::beginTransaction();

        $tenantContract = Contract::where('id', $id)->firstOrFail();

        $statementOfAccount = $tenantContract->statement()->create($request->only('statement_of_account_number','statement_date','rental_period_start','rental_period_end','payment_due_date'));

        foreach($request->file('soaAttachments') as $attachment)
        {
            $path = Storage::put("attachments/contract/$id/soa/$statementOfAccount->id",$attachment);
            $statementOfAccount->attachments()->create(['path' => $path,'filename'=> $attachment->getClientOriginalName()]);
        }

        DB::commit();

        return $this->success('Statement of Account created successfully!', $statementOfAccount, 200);

        }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    public function statementOfAccountLists(Request $request,$tenantId)
    {
        // $statements = StatementOfAccount::whereHas('contract',function($query) use($tenantId) {
        //                     $query->where('contract_id',$tenantId);
        // });

        // if($request->input('query')){

        //         if(!empty($request->input('query')['soa_date'])){
        //             $statements->whereDate('statement_date',$request->input('query')['soa_date']);
        //         }

        //         if(!empty($request->input('query')['soaNumber'])){
        //             $statements->where('statement_of_account_number','like','%'.$request->input('query')['soaNumber'].'%');
        //         }
        // }

        // return $statements->get();


        $lists = SoaImport::where(['tenant_number' => $tenantId,
                                   'status' => 1])->get();
        foreach($lists as $list)
        {
           $date = Carbon::createFromFormat('Ym',$list->period_start)->toFormattedDateString();
           $dateParts = explode(' ', $date);
           $list->period_start = $dateParts[0].' '.$dateParts[2];
        }
        return $lists;
    }


    public function statementOfAccountAttachment($soaNumber)
    {
        return StatementOfAccount::with('attachments')->where('id',$soaNumber)->get()->pluck('attachments')->flatten(1);
        }
}
