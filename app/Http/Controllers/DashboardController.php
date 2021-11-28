<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    /**
     * Show the container listing.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(): Renderable
    {
        return view('dashboard');
    }
}
