<?php

namespace App\Interfaces;

interface AnnouncementInterface
{
    public function storeAnnouncement($request);

    public function viewAnnouncement($id);

    public function announcementList();

    public function deactivateAnnouncement($announcementID);

    public function announcements();

    public function tenantList();
}
