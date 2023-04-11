<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'lease_number',
        'location',
        'unit_code',
        'business_type',
        'business_line',
        'unit_type',
        'status',
        'floor_area',
        'lease_term_start',
        'lease_term_end',
        'lessee',
        'owner',
        'address',
        'tenant_number'
    ];
    protected $primaryKey   = 'lease_number';
    public $incrementing = false;

    public $timestamps = false;

    public function tenant()
    {
        return $this->belongsTo(MasterTenant::class,'tenant_number','tenant_number');
    }

}
