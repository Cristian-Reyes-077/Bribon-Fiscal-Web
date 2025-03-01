<?php

namespace App\Controllers;

    class Home extends BaseController
{
    public function dashboard(): string
    {
        return view('Pages/Home');
    }
}
    