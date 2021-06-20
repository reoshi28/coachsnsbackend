<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Share;

class ShareController extends Controller
{
    public function index(Request $request)
    {
        $items = Share::whith('share')->get($request->all());
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
    public function update(Request $request, Share $share)
    {
        $update = [
            'share' => $request->share,
        ];
        $item = Share::where('id', $share->id)->update($update);
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
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

    public function add(Request $request)
    {
        return view('share.add');
    }
    public function create(Request $request)
    {
        $this->validate($request, Share::$rules);
        $share = new Share;
        $form = $request->all();
        unset($form['_token_']);
        $share->fill($form)->save();
        return redirect('/share');
    }
}
