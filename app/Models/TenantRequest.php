<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantRequest extends Model
{
    use HasFactory;
    public $timestamps  = false;
    protected $fillable = [
        'request_id',
        'user_id'
    ];

    public function submit_request()
    {
        return $this->belongsTo(TenantContactUs::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
