<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\User;
use Dompdf\Dompdf;
class PrintController extends Controller
{
    public function printpreviewUser()
    {
        $dompdf = new Dompdf();
        $dompdf->getOptions()->setChroot(public_path());
        $dompdf->loadHtml(view('pages.profile.printUsers',['Users' => User::with('people')->get()]));
        $dompdf->render();
        $dompdf->stream();
    }

    public function pdfpreviewTenant()
    {

        $dompdf = new Dompdf();
        $dompdf->getOptions()->setChroot(public_path());
        $dompdf->loadHtml(view('pages.tenants.printTenant',['Tenants' => People::with('user')->whereHas('user',function($query){$query->where('role_id',4);})->get()]));
        $dompdf->render();
        $dompdf->stream();
    }
}
