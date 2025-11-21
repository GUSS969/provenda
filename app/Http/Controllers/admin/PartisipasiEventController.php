<?php

namespace App\Http\Controllers;

use App\Models\PartisipasiEvent;
use Illuminate\Http\Request;

class PartisipasiEventController extends Controller
{
    public function index()
    {
        return response()->json(
            PartisipasiEvent::with(['umkm', 'event'])->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'umkm_id' => 'required',
            'event_id' => 'required',
            'tanggal_bergabung' => 'required',
            'status_partisipasi' => 'required',
        ]);

        $data = PartisipasiEvent::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = PartisipasiEvent::findOrFail($id);
        $data->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        PartisipasiEvent::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
