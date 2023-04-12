<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\MallDirectory;
use App\Models\MasterTenant;
use App\Models\Role;
use App\Models\SystemLog;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Traits\ResponseApi;
use Carbon\Carbon;
use Error;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class AuthController extends Controller
{

    use ResponseApi;
    public function authenticate(Request $request)
    {
        try{

            DB::beginTransaction();

            /*********************************************
            * Validate user if registered
            *********************************************/
            $valid = Auth::attempt($request->only('email','password'));


            if(!$valid) throw new Error('Invalid Username Or Password',404);

            $user = Auth::user();

            $redirect ="";


            /*********************************************
            * This is a case statement that has redirect
            * to a route in different user role.
            *********************************************/
            switch($user->role_id){
                case Role::ADMIN:
                        $redirect = RouteServiceProvider::ADMIN_DASHBOARD;
                    break;
                case Role::STAFF:
                        $redirect = RouteServiceProvider::STAFF_DASHBOARD;
                    break;
                case Role::CUSTOMER:
                        $redirect = RouteServiceProvider::CUSTOMER_PAGE;
                    break;
                default:
                    throw new Error('Invalid User Role', 400);
                break;
            }

            DB::commit();

            return $this->success(true,['redirect_to' => $redirect],200);

        }catch(Throwable $e){

            DB::rollBack();

            return $this->error($e->getMessage(),$e->getCode());
        }

    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        if(Auth::user()->isCustomer()){
            /*********************************************
            * Logging out currently authenticated user
            *********************************************/
            Auth::logout();
            return redirect('/');
        }else{
            Auth::logout();
            return redirect('/login');

        }
        /*********************************************
        * Invalidate user session
        *********************************************/
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        /*********************************************
        *  redirect user to root
        *********************************************/
        
    }

    public function dashboard()
    {
        $user = Auth::user();


        if(Auth::user()->isAdmin()){
            $announcements = Announcement::where('status',1)->get();
        }else if(Auth::user()->isTenant()){

            $user_tenant = $user->load('tenants.master_tenant.contracts');
            $user_contract = $user_tenant->tenants[0]->master_tenant;
            $announcements = Announcement::with('user_announcements.role')->where('status',1)->whereHas('user_announcements',function($query){
                $query->where('role_id',Auth::user()->role_id);
            })->get();

            $specific_announcements = Announcement::with('specific_announcement')->whereHas('specific_announcement',function($query){
                $query->where('tenant_id', Auth::user()->tenants[0]->id);
            })->get();

            $categorized_announcement = Announcement::with('categorized_announcement')->whereHas('categorized_announcement', function($query) use($user_contract){
                $query->where('category',($user_contract ? $user_contract->contracts[0]->business_type : ''));
            })->get();

           $announcements = $merged_announcement = $announcements->merge($specific_announcements,$categorized_announcement);

        }else{

            $announcements = Announcement::with('user_announcements.role')->where('status',1)->whereHas('user_announcements',function($query){
                $query->where('role_id',Auth::user()->role_id);
		})->get();
        }

        foreach($announcements as $announcement)
        {
         $announcement->user_announcements['added_by_data'] = User::with('people','role')->findOrFail($announcement->added_by);
        }


        foreach(SystemLog::with('user.people')->get() as $log)
        {
            if($log->status === 2){
                $date_diff = (strtotime(Carbon::now()) - strtotime($log->created_at));

                if( abs(round($date_diff/86400)) >= 2)  SystemLog::where('id',$log->id)->update(['status' => 3]);
            }
        }
        $expiredContracts = MasterTenant::with('contracts')->whereHas('contracts', function($query){
            $query->where('lease_term_end','<=', now()->subMonth());
        })->get();


        return view('pages.dashboard.dashboard',['roles' => Role::get(),
                                                 'announcements' => $announcements,
                                                 'expiredContracts' => $expiredContracts,
                                                 'users' => count(User::get()),
                                                 'mallDirectories' => count(MallDirectory::get()),
                                                 'logs' => SystemLog::with('user.people')->where('status', '<>',3)->get()]);
    }
}
