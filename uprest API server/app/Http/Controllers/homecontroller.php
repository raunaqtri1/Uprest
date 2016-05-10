<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class homecontroller extends Controller{
public function getIndex(){

	$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/test?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvbGFyYXZlbFwvcHVibGljXC9hcGlcL3VwZGF0ZW1haWwiLCJpYXQiOiIxNDQ0Mzc0Njg5IiwiZXhwIjoiMTQ0NDM3ODMwMyIsIm5iZiI6IjE0NDQzNzQ3MDMiLCJqdGkiOiI1YWJmZGYyOTRlYWM1MjUzYjZlNDAxNjM3NjQyODljOCJ9.SOooaTW8osaBHH-vMMfeukIWokpDrgkONCybfPcNmUI",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
   
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
 $headers = array();

    $header_text = substr($response, 0, strrpos($response, "\r\n\r\n"));
    dd($response);
    foreach (explode("\r\n", $header_text) as $i => $line)
        if ($i === 0)
            $headers['http_code'] = $line;
        else
        {
            list ($key, $value) = explode(': ', $line);

            $headers[$key] = $value;
        }
     //dd($response);
 echo substr($headers['Authorization'],-297);
}
 public function getLogin(){
 	return view('login1');
 }

 public function postLogin(Request $request){
 $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/login",
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS     => array(
        "email" => $request->get('email'),
        "password" =>$request->get('passwd'),
    )
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
dd($result);
 }

public function getLogout(){

	return redirect('/');
}

public function getNews1(){
return view('news1');
}

}