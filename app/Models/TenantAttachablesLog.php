<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantAttachablesLog extends Model
{
    use HasFactory;

    protected $fillable = ['attachable_id','attachable_type','status','user_id','taggable_id'];

    public function attachable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function master_tenant_lease_number()
    {
        return $this->belongsTo(MasterTenant::class,'taggable_id','lease_number');
    }

    public function master_tenant_number()
    {
        return $this->belongsTo(MasterTenant::class,'taggable_id','tenant_number');
    }
}
