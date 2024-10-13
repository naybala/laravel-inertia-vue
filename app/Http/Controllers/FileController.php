<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $path = $request->file('file')->store('uploads', 'public');
        return response()->json(['message' => 'File uploaded successfully', 'path' => $path]);
    }
}
