<?php

namespace App\Http\Controllers\penyelenggara;

use App\Http\Controllers\Controller;
use App\Models\UmkmEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UmkmController extends Controller
{
    /**
     * Display a listing of UMKM
     */
    public function index()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        // Ambil semua UMKM yang terdaftar di event penyelenggara ini
        $umkms = UmkmEvent::where('penyelenggara_id', $penyelenggaraId)
                         ->with('event')
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);
        
        return view('penyelenggara.umkm.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penyelenggaraId = Session::get('penyelenggara_id');
        
        // Ambil event milik penyelenggara ini
        $events = Event::where('penyelenggara_id', $penyelenggaraId)->get();
        
        return view('penyelenggara.umkm.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Coming soon
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Coming soon
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Coming soon
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Coming soon
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Coming soon
    }
}