<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 1;
    public const FINANCE = 2;
    public const LEASING = 3;
    public const TENANTS = 4;
    Public const TRMO = 5;

    protected $fillable = [
        'description'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
