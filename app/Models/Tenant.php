<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public $timestamps  = false;

    protected $fillable = [
        'id',
        'user_id',
        'tenant_number',
        'collection_handler'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function master_tenant(){
        return $this->hasOne(MasterTenant::class,'tenant_number','tenant_number');
    }

    public function notices(){
        return $this->hasMany(Notice::class);
    }

}
