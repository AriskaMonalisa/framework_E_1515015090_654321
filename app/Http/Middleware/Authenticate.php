<?php
namaespace App\Http\Middleware;

use Closure;
class AuthentifikasiUser
{
	private $auth;

	public function__contruct(){
		$this->auth = app('auth');
	}
	public function handle(request, Closure $next){
		if($this->auth->check()){
			return $next($request);

		}
		return redirect('login')->withErrors('Silahkan login terlebih dahulu');
		
	}
}