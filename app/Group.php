<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Produk;


class Group extends Model {
	
	protected $fillable=array('nama','detail','display_on_home');
	protected $table='group';

	public function produk(){
		return $this->belongsToMany('App\Produk')->withTimestamps();
		}
} 