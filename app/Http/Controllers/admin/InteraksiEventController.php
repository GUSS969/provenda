<?php

namespace App\Http\Controllers\admin;

use App\Models\InteraksiEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class InteraksiEventController extends Controller
{
    public function index()
    {
        return response()->json(
            InteraksiEvent::with('event')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'jenis_interaksi' => 'required',
            'ip_address' => 'required',
        ]);

        $data = InteraksiEvent::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function destroy($id)
    {
        InteraksiEvent::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
