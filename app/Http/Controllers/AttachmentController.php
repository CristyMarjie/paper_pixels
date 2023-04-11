<?php

namespace App\Http\Controllers;

use App\Models\Attachables;
use App\Models\SoaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function download(Request $request)
    {
        $attachment = Attachables::where('id',$request->id)->where('filename',$request->filename)->firstOrFail();

        if(!Storage::exists($attachment->path)) abort(404);

        return Storage::download($attachment->path,$attachment->filename);
    }


    public function downloadSoa($soaNumber)
    {
        $soa = SoaImport::where('soa_number',$soaNumber)->firstOrFail();

        if(!Storage::exists($soa->filename)) abort(404);

        return Storage::download($soa->filename);
    }
}
