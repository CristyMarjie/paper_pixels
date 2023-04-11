<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MallDirectory extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'mall_name',
        'mall_address',
        'mall_hours'
    ];

    public function creditCollectionAnalysts()
    {
        return $this->hasMany(CreditCollectionAnalyst::class);
    }

    public function posAdmin()
    {
        return $this->hasOne(PosAdmin::class);
    }
}
