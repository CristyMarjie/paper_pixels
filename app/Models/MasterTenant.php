<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTenant extends Model
{
    use HasFactory;

    protected $primaryKey   = 'lease_number';
    public $incrementing = false;

    protected $fillable = ['person_responsible', 'lease_number','tenant','customer_name','tenant_number','location'];

    public $timestamps = false;

    public function contracts()
    {
        return $this->hasMany(MasterContract::class,'tenant_number','tenant_number');
    }

    public function additional()
    {
        return $this->belongsTo(Tenant::class,'tenant_number','tenant_number');
    }

    public function birupload()
    {
        return $this->hasMany(BirAttachment::class,'contract_id','lease_number');
    }

    public function attachables(){
        return $this->hasMany(TenantAttachablesLog::class,'lease_number','taggable_id');
    }

    public function tenant_attachables()
    {
        return $this->hasMany(TenantAttachablesLog::class,'tenant_number','taggable_id');
    }
}
