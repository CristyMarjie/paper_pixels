<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'lessor',
        'address_of_lessor',
        'lesse',
        'address_of_lesse',
        'lesse_trade_name',
        'line_of_business',
        'location',
        'floor_area'
    ];

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }

    public function statement()
    {
        return $this->hasMany(StatementOfAccount::class);
    }

    public function attachments()
    {
        return $this->morphOne(Attachables::class,'attachable');
    }

    public function birAttachments()
    {
        return $this->hasMany(birAttachments::class);
    }

}
