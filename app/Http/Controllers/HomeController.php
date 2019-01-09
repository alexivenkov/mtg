<?php

namespace App\Http\Controllers;


use App\Services\CardService;

class HomeController extends Controller
{
    public function index(CardService $cardService)
    {
        $cardService->get('Shock');

        return view('welcome');
    }
}