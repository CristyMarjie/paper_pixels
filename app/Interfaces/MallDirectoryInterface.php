<?php

namespace App\Interfaces;

interface MallDirectoryInterface
{
    public function viewMalls();

    public function storeMallDirectory($request);

    public function storeMallAnalyst($request,$id);

    public function removeAnalyst($id);

    public function updateAnalystInfo($request, $id);
}
