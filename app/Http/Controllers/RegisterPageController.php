<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class RegisterPageController extends Controller
{
    public function __invoke(): View
    {
        return view('auth.register');
    }
}
