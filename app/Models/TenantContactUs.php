<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantContactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'inquiry_title',
        'message',
        'intended_to_id'
    ];

    public function request_submitted()
    {
        return $this->hasMany(TenantRequest::class,'request_id');
    }


}
