<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use URL;

class homecontroller extends Controller{

  public function getContactus(){
    return view('contactus');
  }

   public function getMyfavourites(Request $request){
  $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/myfav?token=".$request->session()->get('token'),
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
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        $temp=json_decode($body,true);
       // dd(substr($matches[0],-301));
        //dd($temp);
        $news=json_decode($temp['response'],true);
    for($i=0;$i<sizeof($news['response']['docs']);$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $news['response']['docs'][$i]['url'] = str_replace($match, $replace, $news['response']['docs'][$i]['url']);
    }
    if(!empty($temp['recommend'])){
    $nyu=json_decode($temp['recommend'],true);
    for($i=0;$i<sizeof($nyu['response']['docs']);$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $nyu['response']['docs'][$i]['url'] = str_replace($match, $replace, $nyu['response']['docs'][$i]['url']);
    }
  }
  else{
    $nyu="No recommendations";
  } 
    return view('article2')->with('news',$news)->with('myfav','yes')->with('recommend',$nyu);

     }
  }

   public function getFilter(Request $request){
    $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/filter?token=".$request->session()->get('token'),
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "input" => rawurldecode($request->get('input')),
    )
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        return $body;
     }

  }

  public function getFollow(Request $request){
    $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/follow?token=".$request->session()->get('token'),
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "category" => $request->get('category'),
    )
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        return response()->json(["status"=>"success"]);
     }

  }

  public function getFavourite(Request $request){
    $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/favourite?token=".$request->session()->get('token'),
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "url" => rawurldecode($request->get('url')),
    )
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        return response()->json(["status"=>"success"]);
     }

  }


  public function getSearch(Request $request){
    if(empty($request->get('q')))
      return view('search');
     $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/search?q=".rawurlencode($request->get('q')),
    CURLOPT_RETURNTRANSFER => true,   
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
curl_close($ch);
 $temp=json_decode($response,true);
 //dd($temp);
 if(empty($temp['articles']['response']['docs']))
  return view('search')->with('data',$temp);
$z=9;
if($temp['articles']['response']['numFound']<9)
  $z=$temp['articles']['response']['numFound'];
 for($i=0;$i<$z;$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $temp['articles']['response']['docs'][$i]['url'] = str_replace($match, $replace, $temp['articles']['response']['docs'][$i]['url']);
    }
  return view('search')->with('data',$temp);
  }

  public function getAutocomplete(Request $request){
$response = json_decode(file_get_contents("http://localhost/laravel/public/api/autocomplete?input=".$request->get('term')),true);
return response()->json($response);
}

  public function getDisplay(Request $request){
      $ch = curl_init();
       if(empty($request->get('strtrow'))){
    $strtrow=0;
  }
  else{
    $strtrow=$request->get('strtrow');
  }
      if($request->session()->has('token')){
        $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/display1?token=".$request->session()->get('token')."&strtrow=".$strtrow,
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "category" => $request->get('category'),
    )
);  
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$temp=json_decode($body,true);
 $news=$temp['response'];
 $strtrow=$strtrow+sizeof($news['response']['docs']);
    for($i=0;$i<sizeof($news['response']['docs']);$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $news['response']['docs'][$i]['url'] = str_replace($match, $replace, $news['response']['docs'][$i]['url']);
    }
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
     }
      }
      else{
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/display?category=".$request->get('category')."&strtrow=".$strtrow,
    CURLOPT_RETURNTRANSFER => true,   
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
curl_close($ch);
 $temp=json_decode($response,true);
 $news=json_decode($temp['response'],true);
 $strtrow=$strtrow+sizeof($news['response']['docs']);
    for($i=0;$i<sizeof($news['response']['docs']);$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $news['response']['docs'][$i]['url'] = str_replace($match, $replace, $news['response']['docs'][$i]['url']);
    }
   } 

    if(empty($request->get('strtrow'))){
    return view('article2')->with('news',$news)->with('strtrow',$strtrow);
      }
    else{
        return response()->json(['news'=>$news,'strtrow'=>$strtrow]);
      }
  }

public function postYourinterest(Request $request){
  //$dat=json_decode($request->get('data'));
  //dd($request->get('data'));

    $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/yourinterest?token=".$request->session()->get('token'),
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "data" => $request->get('data'),
    )
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        return redirect('dashinterest');
     }
}


public function getIndex(){
	return view('index1');
}
public function getDashinterest(Request $request){
  $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/dashinterest?token=".$request->session()->get('token'),
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
$matches = array();
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        $temp=json_decode($body,true);
      }
	return view('dash-interest')->with("inter",$temp);
}
public function postSelectinterest(Request $request){
  dd($request->all());
}
public function getPage(Request $request){
   // dd("http://localhost/laravel/public/api/page?url=".rawurlencode($request->get('url')));
        $ch = curl_init();
        if($request->session()->has('token')){
  $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/page1?token=".$request->session()->get('token'),
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "url" => rawurldecode($request->get('url')),
    )
);  
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
$article = json_decode($body,true);
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
     }
}
else
{
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/page?url=".rawurlencode($request->get('url')),
    CURLOPT_RETURNTRANSFER => true,   
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
curl_close($ch);

 $article = json_decode($response,true);
}
//dd($article);
 return view('page2')->with('article',$article);
}
public function getArticle(Request $request){
  $ch = curl_init();
  if(empty($request->get('strtrow'))){
    $strtrow=0;
  }
  else{
    $strtrow=$request->get('strtrow');
  }
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/article?token=".$request->session()->get('token')."&strtrow=".$strtrow,
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
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      
        $request->session()->put('token', substr($matches["Authorization"],7));
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        $temp=json_decode($body,true);
       // dd(substr($matches[0],-301));
        //dd($temp);

        $news=json_decode($temp['response'],true);
    for($i=0;$i<sizeof($news['response']['docs']);$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $news['response']['docs'][$i]['url'] = str_replace($match, $replace, $news['response']['docs'][$i]['url']);
    }
    $strtrow=$strtrow+sizeof($news['response']['docs']);
    if(!empty($temp['recommend'])){
    $nyu=json_decode($temp['recommend'],true);
    for($i=0;$i<sizeof($nyu['response']['docs']);$i++){
      $match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
        $nyu['response']['docs'][$i]['url'] = str_replace($match, $replace, $nyu['response']['docs'][$i]['url']);
    }
  }
  else{
    $nyu="No recommendations";
  } 
  if(empty($request->get('strtrow'))){
      return view('article2')->with('news',$news)->with('interests',$temp['interests'])->with('sources',$temp['sources'])->with('recommend',$nyu)->with('strtrow',$strtrow);
          }
      else 
      {
        return response()->json(['news'=>$news,'strtrow'=>$strtrow]);
      }
     }
	}
public function getDashboard(){
	return view('dashboard1');
}

public function getInterest(Request $request){
  $ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/category?token=".$request->session()->get('token'),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
$matches = $this->http_parse_headers($header);
   if(array_key_exists('Authorization',$matches)){
      //echo session()->get('token')."<br>";
      $result=json_decode($body);
 
        $request->session()->put('token', substr($matches["Authorization"],7));
     return view('interest')->with('interest',$result->response)->with('inter',$result->interes);
        //echo $matches[0]."<br>";
        //echo session()->get('token')."<br>";
        
     }
}
public function getLogout(Request $request){
		$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/logout?token=".$request->session()->get('token'),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => array(),
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
$response=json_decode($result);
if(array_key_exists('status',$response)){
  $request->session()->forget('token');
  $request->session()->forget('name');
$request->session()->forget('email');
$request->session()->forget('password');
	return redirect('/');
}
else
{
	return back();
}
}

public function postUpdatemail(Request $request){
	$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/updatemail?token=".$request->session()->get('token'),
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS     => array(
        "email" => $request->get('email'),
    )
);
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);
curl_close($ch);
 $headers = array();
$matches = array();
$res=json_decode($body,true);
$request->session()->forget('token');
$request->session()->forget('email');
$request->session()->forget('password');
$request->session()->forget('name');
    	$url=action('homecontroller@getIndex');
	return redirect($url.'#signupsuccessful')->with('semail',$request->get('email'))
							   ->with('message',$res['message']);
    
  

}
public function postLogin(Request $request){
$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/login",
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS     => array(
        "email" => $request->get('email'),
        "password" =>$request->get('password'),
        "confirmed" => 1,
    )
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
//dd($result);
$response=json_decode($result);
if(array_key_exists('token',$response)){
   $request->session()->put('token', $response->token);
   $request->session()->put('email',$request->get('email') );
   $request->session()->put('name',$response->name );
   $request->session()->put('password',$request->get('password') );
   return redirect('dashboard');
}
else{
	$url=URL::previous();
  if(!empty($response->message)){
    return redirect($url.'#signupsuccessful')->with("message",$response->message);
  }
	return redirect($url.'#signin')->with('semail',$request->get('email'))
							   ->with('error',$response);
}

}

public function postSignup(Request $request){
$ch = curl_init();
$curlConfig = array(
    CURLOPT_URL            => "http://localhost/laravel/public/api/signup",
    CURLOPT_POST           => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS     => array(
        "email" => $request->get('email'),
        "password" =>$request->get('password'),
        "name" =>$request->get('name'),
    )
);
curl_setopt_array($ch, $curlConfig);
$result = curl_exec($ch);
curl_close($ch);
$response=json_decode($result);
if(array_key_exists('token',$response)){
   $request->session()->put('token', $response->token);
   $request->session()->put('email',$request->get('email') );
   $request->session()->put('name',$request->get('name') );
   $request->session()->put('password',$request->get('password') );
   $u=URL::previous();
   return redirect($u.'#signupsuccessful')->with("message",$response->message);
}
else{
  if(!empty($response->message)){
  $u=URL::previous();
   return redirect($u.'#signupsuccessful')->with("message",$response->message);
 }
	return back()->withInput()->with('message',$response)
							  ->with('sname',$request->get('name'))
							  ->with('semail',$request->get('email'));
}

}

function http_parse_headers($raw_headers)
    {
        $headers = array();
        $key = ''; // [+]

        foreach(explode("\n", $raw_headers) as $i => $h)
        {
            $h = explode(':', $h, 2);

            if (isset($h[1]))
            {
                if (!isset($headers[$h[0]]))
                    $headers[$h[0]] = trim($h[1]);
                elseif (is_array($headers[$h[0]]))
                {
                    // $tmp = array_merge($headers[$h[0]], array(trim($h[1]))); // [-]
                    // $headers[$h[0]] = $tmp; // [-]
                    $headers[$h[0]] = array_merge($headers[$h[0]], array(trim($h[1]))); // [+]
                }
                else
                {
                    // $tmp = array_merge(array($headers[$h[0]]), array(trim($h[1]))); // [-]
                    // $headers[$h[0]] = $tmp; // [-]
                    $headers[$h[0]] = array_merge(array($headers[$h[0]]), array(trim($h[1]))); // [+]
                }

                $key = $h[0]; // [+]
            }
            else // [+]
            { // [+]
                if (substr($h[0], 0, 1) == "\t") // [+]
                    $headers[$key] .= "\r\n\t".trim($h[0]); // [+]
                elseif (!$key) // [+]
                    $headers[0] = trim($h[0]);trim($h[0]); // [+]
            } // [+]
        }

        return $headers;
    }

}