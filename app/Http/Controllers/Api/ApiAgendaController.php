<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class ApiAgendaController extends Controller
{
    //
    public function index()
    {
        return Agenda::all();
    }
}
