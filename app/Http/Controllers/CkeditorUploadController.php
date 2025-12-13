<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CkeditorUploadController extends Controller
{
    public function store(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return response()->json(['error' => ['message' => 'Файл не найден']], 400);
        }

        $request->validate([
            'upload' => 'image|mimes:jpg,jpeg,png,webp,gif|max:8192',
        ]);

        $path = $request->file('upload')->store('blog/content', 'public');

        return response()->json([
            'url' => Storage::url($path),
        ]);
    }
}

