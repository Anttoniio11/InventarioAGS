<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ElementosBajaService;

class ElementosBajaController extends Controller
{
    
    protected $elementosBajaService;

    public function __construct(ElementosBajaService $elementosBajaService) {
        $this->elementosBajaService = $elementosBajaService;
    }

    public function elementosBaja()
    {
        return view('bajas.elementosBaja');
    }

    

}
