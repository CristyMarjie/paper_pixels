<?php
namespace App\Repositories;
use App\Interfaces\AnnouncementInterface;
use App\Models\Announcement;
use App\Models\MasterContract;
use App\Models\Tenant;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Traits\ResponseApi;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Environment\Console;

class AnnouncementRepository implements AnnouncementInterface
{
    use ResponseApi;

    public function storeAnnouncement($request)
    {
        try{
            DB::beginTransaction();
            $announcement = Announcement::create($request->only('title','description')
                                                               +['added_by' => Auth::user()->id]);
            if($request->specific){
                foreach($request->specific as $spec)
                {
                    if($spec != 0 || null)
                    {
                        $announcement->specific_announcement()->create(['tenant_id' => $spec]);
                    }
                }
            }

            if($request->category){
                foreach($request->category as $category)
                {
                    $announcement->categorized_announcement()->create(['category' => $category]);
                }
            }
            if(!$request->specific || $request->specific != 0){
                 foreach($request->roles as $role)
                {
                    $announcement->user_announcements()->create(['role_id' => $role ]);
                }
            }



            if($request->file('announcementAttachment') ){
                foreach($request->file('announcementAttachment') as $attachment)
                {
                    $path = Storage::put("announcement/attachment/$announcement->id", $attachment);
                    $announcement->update(['filename' => $attachment->getClientOriginalName(),
                                           'path' => $path]);
                }
            }

            DB::commit();
            return $this->success('Announcement created!',$announcement,200);
        }catch(Exception $e){
            DB::rollBack();
            return $this->error($e->getMessage(),$e->getCode());
        }
    }

    public function viewAnnouncement($id)
    {
        $announcement =  Announcement::with('user_announcements.role')->findOrFail($id);

        $addedBy = User::with('people','role')->findOrFail($announcement->added_by);
        $now = time();
        $created = \strtotime($announcement->created_at);
        $datedif = $now - $created;
        return view('pages.announcement.announcement_view_details_v1',[
            'announcement' => $announcement,
            'day_count' => round($datedif / (60 * 60 * 24)),
            'addedBy' =>  $addedBy]);
    }

    public function announcementList()
    {
        $announcements = Announcement::with('user_announcements.role')->where('status',1)->get();
        foreach($announcements as $announcement)
        {
         $announcement->user_announcements['added_by_data'] = User::with('people','role')->findOrFail($announcement->added_by);
        }

        return view('pages.announcement.view_announcement_v1',['Announcements' => $announcements,
                                                               'count' => count($announcements)]);
    }

    public function announcements()
    {
        return Announcement::whereHas('user_announcements',function($query){
                $query->where('role_id',Auth::user()->role_id);
        })->get();
    }

    public function deactivateAnnouncement($announcementID)
    {
        (Announcement::findOrFail($announcementID))->update(['status' => 0]);
        return redirect('/announcement/list');
    }

    public function tenantList()
    {
        return Tenant::with('user.people','master_tenant')->has('master_tenant')->get();
    }
}
