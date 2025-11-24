<?php

namespace App\Http\Controllers\admin;

use App\Models\StatistikPromosi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class StatistikPromosiController extends Controller
{
    public function index()
    {
        return response()->json(StatistikPromosi::with('event')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'total_view' => 'required',
            'total_like' => 'required',
            'periode' => 'required',
        ]);

        $data = StatistikPromosi::create($request->all());

        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = StatistikPromosi::findOrFail($id);
        $data->update($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        StatistikPromosi::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
