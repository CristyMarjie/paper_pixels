<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoaImport extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_number','soa_number','filename','period_start','status'];

    public $timestamps = false;
}
