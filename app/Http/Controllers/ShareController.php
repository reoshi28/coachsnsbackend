<?php

namespace App\Http\Controllers;

use App\Models\Share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function index(Request $request)
    {
        $items = Share::all();
        return response()->json([
            'data' => $items
        ], 200);
    }
    public function store(Request $request)
    {
        $item = Share::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }
    public function show(Share $share)
    {
        $item = Share::find($share);
        if ($item) {
            return response()->json([
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    
    public function destroy(Share $share)
    {
        $item = Share::where('id', $share->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
