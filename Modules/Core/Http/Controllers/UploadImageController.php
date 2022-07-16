<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('uploaded', 'public');

        $url = Storage::disk('public')->url($path);

        return  response()->json([
            'data' => [
                'filePath' => $url,
            ],
        ]);
    }
}
