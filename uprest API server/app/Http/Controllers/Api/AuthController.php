<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;
use App\category;
use SolrClient;
use SolrQuery;
use DB;
use Mail;
use Input;
use Auth;
class AuthController extends Controller {

    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function dashinterest(){
        $user = JWTAuth::parseToken()->authenticate();
        $interes=array();
foreach ($user->categories as $categ) {
array_push($interes,$categ->category);
}
return response()->json($interes);
    }
      
      public function myfav(Request $request){
           $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$qry='';
$user = JWTAuth::parseToken()->authenticate();
$zzz=DB::table('user_article')->where('user_id', '=', $user->id)->get();
foreach ( $zzz as $categ) {
$row=DB::table('articles')->where('id', '=', $categ->article_id)->first();
$match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
 $row->url=str_replace($match, $replace, $row->url);
$qry=$qry.'id:'.$row->url.' || ';
}
$qry=substr($qry,0,strlen($qry)-4);
//return $qry;
//return $qry;
if($qry==''){
$response="No favourites";
}
$query->setQuery($qry);
$query->setStart(0);
$query->setRows(12);
$query->addField('title');
$query->addField('source');
$query->addField('description');
$query->addField('url');
$query->addSortField('date');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$mrg=array();
foreach ($user->categories as $categ) {
$ids = DB::table('article_category')->where('category_id', '=',$categ->id)->lists('article_id');
    $mrg= array_merge($mrg,$ids);
 }
 $zuzu=DB::table('user_article')->where('user_id', '=',$user->id)->lists('article_id');
 $mrg=array_diff($mrg, $zuzu);
 $zizi=DB::select('select article_id,count(*) as t from user_article group by article_id order by t desc');
 $zmzm=array();
 foreach($zizi as $u){
    array_push($zmzm, $u->article_id);
 }
$mrg=array_intersect($zmzm, $mrg);
$abc=DB::table('articles')->whereIn('id', $mrg)->get();
$qry='';
foreach ( $abc as $categ) {
//$row=DB::table('articles')->where('id', '=', $categ->article_id)->first();
$match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
 $categ->url=str_replace($match, $replace, $categ->url);
$qry=$qry.'id:'.$categ->url.' || ';
}
$qry=substr($qry,0,strlen($qry)-4);
if($qry=='')
{
    $rslt="";
}
else{
$query= new SolrQuery();
$query->setQuery($qry);
$query->setStart(0);
$query->setRows(6);
$query->addField('title');
$query->addField('source');
$query->addField('description');
$query->addField('url');
$query_response = $client->query($query);
$rslt = $query_response->getRawResponse();
}
 return response()->json(['response'=>$response,'recommend'=>$rslt]);
    }

     public function filter(Request $request){
           $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
$qry3='';
$user = JWTAuth::parseToken()->authenticate();
$interes=array();
foreach ($user->categories as $categ) {
$qry3=$qry3.'category:'.$categ->category.' || ';
array_push($interes,$categ->category);
}
$qry3=substr($qry3,0,strlen($qry3)-4);
//dd('id:'.$request->get('url'));
$qry='';
$qry1='';
$xyz=json_decode($request->get('input'),true);
if(!empty($xyz['interests'])){
    $qry='(';
foreach ( $xyz['interests'] as $categ) {
$qry=$qry.'category:'.$categ.' || ';
}
$qry=substr($qry,0,strlen($qry)-4);
$qry=$qry.")";
}
if(!empty($xyz['sources'])){
    $qry1='(';
foreach ( $xyz['sources'] as $categ) {
$qry1=$qry1.'source:'.$categ.' || ';
}
$qry1=substr($qry1,0,strlen($qry1)-4);
$qry1=$qry1.")";
}
if($qry=='')
{
    if($qry1=='')
    {
        $qry=$qry3;
    }
    else{
        $qry=$qry1;
    }
}
else{
    if($qry1=='')
    {
        
    }
    else{
        $qry=$qry." && ".$qry1;
    }

}
//return $qry;
$query->setQuery($qry);
$query->setStart(0);
$query->setRows(12);
$query->addSortField('date');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
    return $response;
    }


    public function display1(Request $request){
        $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery('category:'.$request->get('category'));
$query->setStart($_GET['strtrow']);
$query->setRows(12);
$query->addSortField('date');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
        $user = JWTAuth::parseToken()->authenticate();
        $row=DB::table('categories')->where('category', '=', $request->get('category'))->first();
        $ro=DB::table('interest_category')->where('category_id', '=', $row->id)->where('user_id', '=', $user->id)->first();
        if($ro){
array_push($result, ["follow"=>"yes"]);
}
else{
    array_push($result, ["follow"=>"no"]);
}

    return response()->json(['response'=>$result]);
   } 

    public function follow(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $row=DB::table('categories')->where('category', '=', $request->get('category'))->first();
        $ro=DB::table('interest_category')->where('category_id', '=', $row->id)->where('user_id', '=', $user->id)->first();
        if($ro){
        DB::table('interest_category')->where('category_id', '=', $row->id)->where('user_id', '=', $user->id)->delete();
       }
       else{
        DB::table('interest_category')->insert(
    ['user_id' => $user->id, 'category_id' => $row->id]);
       }
       return response()->json(["status"=>"success"]);
    }

    public function favourite(Request $request){
        $user = JWTAuth::parseToken()->authenticate();
        $row=DB::table('articles')->where('url', '=', $request->get('url'))->first();
        $ro=DB::table('user_article')->where('article_id', '=', $row->id)->where('user_id', '=', $user->id)->first();
        if($ro){
        DB::table('user_article')->where('article_id', '=', $row->id)->where('user_id', '=', $user->id)->delete();
       }
       else{
        DB::table('user_article')->insert(
    ['user_id' => $user->id, 'article_id' => $row->id]);
       }
       return response()->json(["status"=>"success"]);
    }
  
     public function search(Request $request){
        $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery('category:'.$request->get('q'));
$query->setStart(0);
$query->setRows(10);
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
$categ=array();
foreach ($result['response']['docs'] as $y) {
    array_push($categ,$y['category'][0]);
}
$categ = array_unique($categ);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery('source:'.$request->get('q'));
$query->setStart(0);
$query->setRows(10);
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
$src=array();
foreach ($result['response']['docs'] as $y) {
    array_push($src,$y['source'][0]);
}
$src = array_unique($src);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery($request->get('q'));
$query->setStart(0);
$query->setRows(9);
$query->addSortField('date');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
  return response()->json(["categories"=>$categ,"sources"=>$src,"articles"=>$result,"q"=>$request->get('q')]);
   }

    public function autocomplete(Request $request){
        $va=file_get_contents("http://localhost:8983/solr/collection1/suggesthandler?wt=json&suggest.q=".$request->get('input'));
        $var= json_decode($va,true);
        $response=array();
        foreach ($var['suggest'] as $x ) {
            foreach ($x[$request->get('input')]['suggestions'] as $y) {
                array_push($response,$y['term']);
            }
        }
        return response()->json($response);
    }

   public function display(Request $request){
        $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery('category:'.$request->get('category'));
$query->setStart($request->get('strtrow'));
$query->setRows(12);
$query->addSortField('date');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
    return response()->json(['response'=>$response]);
   } 
     public function article(Request $request){
           $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$qry='';
$user = JWTAuth::parseToken()->authenticate();
$interes=array();
foreach ($user->categories as $categ) {
$qry=$qry.'category:'.$categ->category.' || ';
array_push($interes,$categ->category);
}
$qry=substr($qry,0,strlen($qry)-4);
//return $qry;
$query->setQuery($qry);
if(isset($_GET['strtrow'])){
$query->setStart($request->get('strtrow'));
}
else
{
    $query->setStart(0);
}
$query->setRows(12);
$query->addField('title');
$query->addField('source');
$query->addField('description');
$query->addField('url');
$query->addSortField('date');
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=DB::table('sources')->get();
$z=array();
foreach($result as $y)
{
array_push($z, $y->sources);
}
$mrg=array();
foreach ($user->categories as $categ) {
$ids = DB::table('article_category')->where('category_id', '=',$categ->id)->lists('article_id');
    $mrg= array_merge($mrg,$ids);
 }
 $zuzu=DB::table('user_article')->where('user_id', '=',$user->id)->lists('article_id');
 $mrg=array_diff($mrg, $zuzu);
 $zizi=DB::select('select article_id,count(*) as t from user_article group by article_id order by t desc');
 $zmzm=array();
 foreach($zizi as $u){
    array_push($zmzm, $u->article_id);
 }
$mrg=array_intersect($zmzm, $mrg);
$abc=DB::table('articles')->whereIn('id', $mrg)->get();
$qry='';
foreach ( $abc as $categ) {
//$row=DB::table('articles')->where('id', '=', $categ->article_id)->first();
$match = array('\\', '+', '-', '&', '|', '!', '(', ')', '{', '}', '[', ']', '^', '~', '*', '?', ':', '"', ';', ' ');
        $replace = array('\\\\', '\\+', '\\-', '\\&', '\\|', '\\!', '\\(', '\\)', '\\{', '\\}', '\\[', '\\]', '\\^', '\\~', '\\*', '\\?', '\\:', '\\"', '\\;', '\\ ');
 $categ->url=str_replace($match, $replace, $categ->url);
$qry=$qry.'id:'.$categ->url.' || ';
}
$qry=substr($qry,0,strlen($qry)-4);
if($qry=='')
{
    $rslt="";
}
else{
$query= new SolrQuery();
$query->setQuery($qry);
$query->setStart(0);
$query->setRows(6);
$query->addField('title');
$query->addField('source');
$query->addField('description');
$query->addField('url');
$query_response = $client->query($query);
$rslt = $query_response->getRawResponse();
}
//dd($abc);
 //$abc=DB::table('articles')->whereNotIn('id', $mrg)->get();
//dd(['response'=>$response,'interests'=>$interes,'sources'=>$z]);
    return response()->json(['response'=>$response,'interests'=>$interes,'sources'=>$z,'recommend'=>$rslt]);
    }

    public function yourinterest(Request $request){
        $dat=json_decode($request->get('data'));
        for($i=0;$i<sizeof($dat);$i++){
            $dat[$i]=strtolower($dat[$i]);
        }
        $user = JWTAuth::parseToken()->authenticate();
  $ids = DB::table('interest_category')->where('user_id', '=', $user->id)->lists('category_id');
     $abc=category::whereIn('id', $ids)->get();
     $result=array();
     foreach ($abc as $categ) {
   array_push($result, $categ->category);
    } 
        $x1=array_diff($dat,$result);
        $x2=array_intersect($dat,$result);
        $x3=array_diff($result, $x2);
        if(!empty($x3)){
            foreach ($x3 as $va) {
                        $categ= category::where('category', '=', strtolower($va))->first();
            DB::table('interest_category')->where('user_id', '=', $user->id)->where('category_id','=',$categ->id)->delete();
         }
        }
        if (!empty($x1)) {
        foreach ($x1 as $interest) {
            $categ= category::where('category', '=', strtolower($interest))->first();
            DB::table('interest_category')->insert(
    ['user_id' => $user->id, 'category_id' => $categ->id]
);
    }
        }

        return response()->json(['status'=>'success']);
    }

    public function category(){
        $categories=category::all();
        $result=array();
        $user = JWTAuth::parseToken()->authenticate();
        $ids = DB::table('interest_category')->where('user_id', '=', $user->id)->lists('category_id');
     $abc=category::whereNotIn('id', $ids)->get();
$interes=array();
foreach ($user->categories as $categ) {
array_push($interes,$categ->category);
}
       foreach ($abc as $categ) {
   array_push($result, $categ->category);
    } 

return response()->json(['status'=>'success','response'=>$result,'interes'=>$interes]);
}
    
    public function page(Request $request){
           $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery('id:'.$request->get('url'));
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
    return $response;
    }

    public function page1(Request $request){
           $options = array
(
   'hostname'     => 'localhost',
        'port'         => '8983',
        'path'         => 'solr/collection1',
        'wt' => 'json', 
);
$client = new SolrClient($options);
$query = new SolrQuery();
//dd('id:'.$request->get('url'));
$query->setQuery('id:'.$request->get('url'));
$query_response = $client->query($query);
$response = $query_response->getRawResponse();
$result=json_decode($response,true);
        $user = JWTAuth::parseToken()->authenticate();
        $row=DB::table('articles')->where('url', '=', $result['response']['docs'][0]['url'])->first();
        $ro=DB::table('user_article')->where('article_id', '=', $row->id)->where('user_id', '=', $user->id)->first();
        if($ro){
array_push($result, ["fav"=>"yes"]);
}
else{
    array_push($result, ["fav"=>"no"]);
}
    return response()->json($result);
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::validate($credentials))
   { 
     $cred=$request->only('email', 'password','confirmed');
     if (!Auth::validate($cred))
     return response()->json(["message"=>"first verify your email"]);
   }
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token

       // dd(json(['token' => JWTAuth::getToken(), 'name' => $user->name]));
        $user= JWTAuth::toUser($token);
        return response()->json(['token' => $token, 'name' => $user->name]);
    }


    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     * 
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, [
            'token' => 'required' 
        ]);
        
        JWTAuth::invalidate($request->input('token'));
        return response()->json(["status"=>"Logged out"]);
    }

    public function signup(Request $request){
            $validator = Validator::make($request->all(),  [
                'name' =>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
                    }
                     $user = new User;
        $confirmation_code = str_random(30);
        $userq = User::whereConfirmationCode($confirmation_code)->first();
        while($userq)
        {
            $confirmation_code = str_random(30);
        }
        $user->confirmation_code = $confirmation_code;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        Mail::send('email',['confirmation_code'=>$confirmation_code,'name' => Input::get('name')], function($message) {
            $message->to(Input::get('email'),Input::get('name'))
                ->subject('Verify your email address');
        });  
        return response()->json(["message"=>"first verify your email"]);

    }

    public function updatemail(Request $request){

        $validator = Validator::make($request->all(),  [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
                    }
        $confirmation_code = str_random(30);
        $userq = User::whereConfirmationCode($confirmation_code)->first();
        while($userq)
        {
            $confirmation_code = str_random(30);
        }
        $user = JWTAuth::parseToken()->authenticate();
        $nam=$user->name;
    $user->confirmation_code = $confirmation_code;
        $user->confirmed = null;
        $user->email = $request->get('email');
        $user->save();     
        JWTAuth::invalidate($request->input('token'));
        Mail::send('email',['confirmation_code'=>$confirmation_code,'name' => $nam], function($message) {
            $message->to(Input::get('email'))
                ->subject('Verify your email address');
        });  
        return response()->json(["message"=>"first verify your email"]);
    }

    public function confirm($confirmation_code)
    {
        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            return redirect('http://localhost:8000/');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        return  redirect('http://localhost:8000/');
    
    }
}