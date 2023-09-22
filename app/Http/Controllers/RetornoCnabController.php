<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Service\Retorno\RetornoCnabService;

class RetornoCnabController extends Controller
{
   public function index()
   {
        $file = storage_path('app/public/retorno/HMLECO11.B465.D0000003-ASCII.TXT');

        $arquivoCnab = new RetornoCnabService($file);
        $arquivoCnab->processar();

        return response()->json($arquivoCnab);
   }
}