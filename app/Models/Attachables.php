<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachables extends Model
{
    use HasFactory;

    protected $fillable = ['attachable_id','attachable_type','path','filename','active'];

    public function attachable()
    {
        return $this->morphTo();
    }
}
