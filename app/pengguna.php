<?php

namespace App;
use Illuminate\Auth\Authenticatable;//1
use Illuminate\Database\Eloquent\Model;//2
use Illuminate\Contract\Auth\Authenticatable as Authenticatable;


class Pengguna extends Model implements Authenticatable
AuthenticatableContract, CanResetPasswordContract
	use Authenticatable,Authorizabel, CanResetPasswordContract

{
	protected $table = 'pengguna';
	protected $fillable =['username','password'];
	
	public function dosen(){
		return $this->hasOne(Dosen::class);
	}
	public function mahasiswa()
	{
		return $this->hasOne(Mahasiswa::class);
	}
	// public function peran()
	// {
	// 	return $this->belongsToMany(Peran::class);
	// }
}