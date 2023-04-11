<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    public const FIRST_NOTICE = 'FIRST_NOTICE';

    public const SECOND_NOTICE = 'SECOND_NOTICE';

    public const THIRD_NOTICE = 'THIRD_NOTICE';

    public const TURNOVER_NOTICE= 'TURNOVER_NOTICE';

    protected $fillable = ['tenant_id','notice_type','notice_details','path'];

    protected $casts = [
        'notice_details' => 'object',
        'created_at' => 'datetime:Y-m-d'
    ];

     public function tenant()
     {
         return $this->belongsTo(Tenant::class);
     }


}
