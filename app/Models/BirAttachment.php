<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'contract_id',
        'path',
        'filename',
        'active',
        'status'
    ];


    public function attachments()
    {
        return $this->morphMany(TenantAttachablesLog::class, 'attachable');
    }

    public function master_tenant()
    {
        return $this->belongsTo(MasterTenant::class,'contract_id','lease_number');
    }
}
