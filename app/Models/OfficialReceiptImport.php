<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialReceiptImport extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_number','or_number','or_date','path','status'];

    public $timestamps = false;


}
