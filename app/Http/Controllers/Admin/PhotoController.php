<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $path = Storage::disk('public')->put('images', $data['path']);
        dd($path);
    }

    public function update(Request $request, $id){
        $photo = [
            'id' => 1,
            'title' => 'Title 1',
            'description'  => 'this is the description',
            'path' => 'images\bAcQbrCFHYNjAD64OGgJObJriMsrWThmgs91xwlD.jpeg'
        ];

        $data = $request->all();
        // se ho già il path della foto cancello vecchia foto e aggiungo nuova, altrimenti salvo solo nuova foto
        if(isset($data['path'])){
            Storage::disk('public')->delete($photo['path']);
        }
    }
}
