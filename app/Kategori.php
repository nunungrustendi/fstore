<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Produk;


class Kategori extends Model {
	
	protected $fillable=array('nama','detail');
	protected $table='kategori';

	public function produk(){
		return $this->hasMany('App\Produk');
		}
} 