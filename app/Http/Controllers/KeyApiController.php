<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Place;
use Illuminate\Http\Request;

class KeyApiController extends Controller
{
    public function getKey(){
        $code = $this->generateRandomString();
        Code::create(['code' => $code ]);
        return response(['code' => $code]);
    }

    public function getPlace(Request $request){
        if($request->code == null || $request->code == "")
            return response('Favor de ingresar la llave pública.', 422);

        if(!Code::where('code', $request->code)->exists())
            return response('No existe esa llave pública.', 404);

        return response(['place' => Place::where('long', $request->long)->where('lat', $request->lat)->first()]);
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

