<?php

namespace App\Controllers;


class InfoPageController extends BaseController
{
    public function index()
    {
        return view('Pages/InfoPage'); // Nombre de la vista
    }
}
