<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorizedAnnouncement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'announcement_id',
        'category'
    ];

    public function cetegorized_announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
