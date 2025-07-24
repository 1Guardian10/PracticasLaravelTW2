<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::where('nombre','like','%d%')->get();

        return view('Clientes.index', compact('clientes'));
    }
}