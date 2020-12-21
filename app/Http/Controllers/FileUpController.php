<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUpController extends Controller
{
    public function fileUp(Request $request)
    {
        if ($request->isMethod('post')){
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $path = $file->getRealPath();
            $filename = date('Y-m-d-h-i-s').'-'.$originalName;
            Storage::disk('public')->put($filename,file_get_contents($path));
            return response()->json(['url'=>env('APP_URL').':8000'.'/storage/'.$filename]);
        }

    }
}
