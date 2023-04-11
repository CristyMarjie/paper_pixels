<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatementOfAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_number',
        'soa_number',
        'filename',
        'period_start'
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachables::class,'attachable');
    }

}
