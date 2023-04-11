<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'timestamp',
        'added_by',
        'status',
        'filename',
        'path'
    ];

    public function user_announcements()
    {
        return $this->hasMany(UserAnnouncement::class);
    }

    public function specific_announcement()
    {
        return $this->hasOne(SpecificAnnouncement::class);
    }

    public function categorized_announcement()
    {
        return $this->hasOne(CategorizedAnnouncement::class);
    }

}
