<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model {
	
	protected $fillable=array('nama','detail');
	protected $table='merk';

	public function produk(){
		return $this->hasMany('App\Produk');
		}
} 