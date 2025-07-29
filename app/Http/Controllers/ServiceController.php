<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Ambil data yang diperlukan untuk halaman layanan
        $data = Service::all();

        return view('services.index', array_merge(compact('data'), ['title' => 'Service']));
    }
}
