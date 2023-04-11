<?php

namespace App\Http\Controllers;

use App\Interfaces\MallDirectoryInterface;
use Illuminate\Http\Request;

class MallDirectoryController extends Controller
{
    protected $mallDirectoryInterface;

    public function __construct(MallDirectoryInterface $mallDirectoryInterface)
    {
        $this->mallDirectoryInterface = $mallDirectoryInterface;
    }

    public function viewMalls()
    {
       return $this->mallDirectoryInterface->viewMalls();
    }

    public function storeMallDirectory(Request $request)
    {
       return $this->mallDirectoryInterface->storeMallDirectory($request);
    }

    public function storeMallAnalyst(Request $request,$id){

        return $this->mallDirectoryInterface->storeMallAnalyst($request,$id);
    }

    public function removeAnalyst($id)
    {
        return $this->mallDirectoryInterface->removeAnalyst($id);
    }

    public function getAnalyst($id)
    {
        return $this->mallDirectoryInterface->getAnalyst($id);
    }

    public function updateAnalystInfo(Request $request,$id)
    {
        return $this->mallDirectoryInterface->updateAnalystInfo($request,$id);
    }
}
