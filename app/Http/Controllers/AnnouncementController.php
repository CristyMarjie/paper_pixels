<?php

namespace App\Http\Controllers;

use App\Interfaces\AnnouncementInterface;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    protected $announcementInterface;

    public function __construct(AnnouncementInterface $announcementInterface)
    {
        $this->announcementInterface = $announcementInterface;
    }

    public function storeAnnouncement(Request $request)
    {
        return $this->announcementInterface->storeAnnouncement($request);
    }

    public function viewAnnouncement($id)
    {
        return $this->announcementInterface->viewAnnouncement($id);
    }

    public function announcementList()
    {
        return $this->announcementInterface->announcementList();
    }

    public function deactivateAnnouncement($announcementID)
    {
        return $this->announcementInterface->deactivateAnnouncement($announcementID);
    }

    public function test()
    {
        return $this->announcementInterface->announcements();
    }

    public function tenantList()
    {
        return $this->announcementInterface->tenantList();
    }
}
