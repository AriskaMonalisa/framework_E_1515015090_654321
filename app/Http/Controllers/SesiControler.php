<?php
namespace App\Http\Controllers;

 use illuminate\Http\Request;
 use App\Http\Request;
 use App\Pengguna;
 use illuminate\Auth\SessionGuard;
 use Auth;

 class SesiController extends Controller
 {
 	public function index()
 	{
 		return view('master');
 	}
 	public function from()
 	{
 		if(Auth::Check())
 		{
 			return redirect('/');
 		}
 		return view('login');
 	}
 	public function vadilasi(Request $input)
 	{
 		$this->validate($input,[
 			'username'=>'required',
 			'password'=>'required',
 			]);
 		$Pengguna = Pengguna::where($input->only('username','password'))
 		->first();
 		if(! is_null($Pengguna)){
 			Auth::login($Pengguna);
 			if(Auth::Check())
 				return redirect('/')->with('informasi',"Selemat Datang".Auth::user()->username);
 		}
 		return redirect('/login')->withErrors(['Pengguna tidak ditemukan']);
 	}
 	public function logout()
 	{
 		if(Auth::Check()){
 			Auth::logout();
 			return redirect('/login')->withErrors(['silahkan login untuk masuk ke system']);
 		}else{
 			return redirect('/login')->withErrors(['Silahkan login terlebih dahulu'])
 		}
 	}

 }