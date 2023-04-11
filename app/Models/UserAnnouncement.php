<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_id',
        'role_id'
    ];

    public $timestamps = false;

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
