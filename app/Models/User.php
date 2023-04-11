<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'super_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function people(){
        return $this->belongsTo(People::class);
    }

    // public function tenant(){
    //     return $this->hasOne(Tenant::class);
    // }


    public function tenants(){
        return $this->hasMany(Tenant::class);
    }

    public function isAdmin(){
        return $this->role_id == Role::ADMIN;
    }

    public function isFinance(){
        return $this->role_id == Role::FINANCE;
    }

    public function isLeasing(){
        return $this->role_id == Role::LEASING;
    }

    public function isTenant(){
        return $this->role_id == Role::TENANTS;
    }

    public function isTrmo(){
        return $this->role_id == Role::TRMO;
    }

}
