<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCollectionAnalyst extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $fillable = [
        'mall_directory_id',
        'analyst_name',
        'analyst_email',
        'analyst_contact'
    ];

    public function mallDirectory()
    {
        return $this->belongsTo(MallDirectory::class);
    }

}
