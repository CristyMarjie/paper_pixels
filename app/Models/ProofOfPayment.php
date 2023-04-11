<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofOfPayment extends Model
{
    use HasFactory;

    public $fillable = [
        'contract_id',
        'date',
        'path',
        'filename',
        'active'
    ];

    public function attachments()
    {
        return $this->morphMany(TenantAttachablesLog::class, 'attachable');
    }
}
