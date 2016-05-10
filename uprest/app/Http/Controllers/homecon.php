<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class homecon extends Controller
{

public function autocomplete(Request $request){
$response = json_decode(file_get_contents("http://localhost/laravel/public/api/autocomplete?input=".$request->get('term')),true);
return response()->json($response);
}

}
