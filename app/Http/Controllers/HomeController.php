<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace Extractora\Http\Controllers;

use Extractora\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package Extractora\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        // return view('menu.usuarios.perfiles.index');
        return view('adminlte::home');
        
    }
}