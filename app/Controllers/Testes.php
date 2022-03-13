<?php

namespace App\Controllers;

class Testes extends BaseController
{
    public function index()
    {
        return view('Testes/index');
    }

    public function novo()
    {
        echo 'Esse é mais um método do controller Testes';
    }
}
