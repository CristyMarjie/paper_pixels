<?php

namespace App\Http\Controllers;

use App\Models\MasterTenant;
use App\Models\Role;
use App\Models\Location;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser()
    {
        return view('pages.profile.add_user',['roles' => Role::get(),'tenants' => MasterTenant::whereNotNull('tenant_number')->get(),'locations' => Location::get()]);
    }
}
