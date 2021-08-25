<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public function index(Request $request)
    {
        $typeSelected = in_array($request->type, ['image','file']) ? $request->type : "image";
        return view('admin.filemanager.index',[
            'types'         => $this->types(),
            'typeSelected'  => $typeSelected,
        ]);
    }

    private function types()
    {
        return [
            'image'     => "Gambar",
            'file'      => "File"
        ];
    }
}
