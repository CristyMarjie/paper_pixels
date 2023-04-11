<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosAdmin extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $fillable = [
        'mall_directory_id',
        'pos_name',
        'pos_email',
        'pos_contact'
    ];

    public function mallDirectory()
    {
        return $this->belongsTo(mallDirectory::class);
    }
}
