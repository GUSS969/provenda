<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Misalnya urutkan berdasarkan id, atau kolom tanggal lainnya
        $events = DB::table('event')->latest()->take(3)->get();

        return view('home', compact('events'));
    }
}
