<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificAnnouncement extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $fillable = [
        'announcement_id',
        'tenant_id'
    ];

public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
