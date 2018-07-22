<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Produk;


class Gambar extends Model {
	
	protected $fillable=array('nama','gambar');
	protected $table='gambar';

	
} 