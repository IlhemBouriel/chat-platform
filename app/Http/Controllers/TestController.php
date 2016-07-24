<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\User;
use App\Publication;


class TestController extends Controller
{
	//Registration
   public function register(Request $Request)
   {
    $name=$Request->get('name');
		$email=$Request->get('email');
		$pass=$Request->get('pass');
		$User = new User();
		$User->name=$name;
		$User->email=$email;
		$User->password=$pass;
	  $User->status='offline';
		$User->save();
    Session::put('email', $email);
    Session::put('name', $name);
    Session::put('id',$User->id);
		return view ('homepage');
   }
   //verify if Email is already token
   public function verify(Request $Request)
   {
   	$email = $Request->get('email');
   	$user = User::where('email' , '=', $email)->first();
   	if ($user)
   	return ($user->name);
   else
   	return ("not found");
   }

   //Connect function
   public function connect(Request $Request)
   {
     $email=$Request->input('email');
     $pass=$Request->input('password');
     $user = User::where('email' , '=', $email)->first();
     if ($user)
     {
     	if ($user->password == $pass)
     {
      Session::put('email', $email);
      Session::put('name', $user->name);
     // Session::put('id',$user->id);
     	return view('homepage');
     }
     else
     {
     	    return view('connect',array('msg'=>'Invalid Password','email'=>$email));
     }
     }
     else
     {
     	    return view('connect',array('msg'=>'Invalid Email Adress','email'=>''));
     }
   }

   //deconnect function
   public function deconnect()
   {
    return view('connect',array('msg'=>'','email'=>''));
   }
    
    //My publications
   public function publication()
   {
    if (Session::has('id'))
    {
      $id = Session::get('id');
      $user = User::find($id);
      $publications = $user->publications();
      return view('publications',array('publications'=>$publications));
    }
   }


}
