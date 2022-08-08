<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $indicadores = [
            [
                'name' => 'Usuários',
                'amount' => rand(43, 92),
            ],
            [
                'name' => 'Clientes',
                'amount' => rand(67, 199),
            ],
            [
                'name' => 'Números',
                'amount' => rand(89, 300),
            ],
        ];

        return Inertia::render('Dashboard', compact('indicadores'));
    }
}
