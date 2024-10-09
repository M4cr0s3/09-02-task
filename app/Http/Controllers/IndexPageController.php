<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndexPageController extends Controller
{
    public function __invoke(): View
    {
        return view('welcome');
    }
}
