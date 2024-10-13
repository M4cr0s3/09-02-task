<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

final class IndexPageController extends Controller
{
    public function __invoke(): View
    {
        return view('welcome');
    }
}
