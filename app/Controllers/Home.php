<?php

namespace App\Controllers;

use CodeIgniter\Controller;


/**
 * Pagina inicial com a listagem de transações
 * @author Matheus Castro <matheuscastroweb@gmail.com>
 * @version 1.0.0
 */
class Home extends Controller
{
    public function index()
    {
        return view('home');
    }
}
