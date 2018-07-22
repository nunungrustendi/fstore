<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kategori;
use App\Merk;

class Produk extends Model{
	
	protected $fillable=array('kategori_id','merk_id','nama','deskripsi','detail','harga_dasar','harga_aktual',
			'num_view',);
	protected $table='produk';
	
	public function kategori(){
		return $this->belongsTo('App\Kategori');
		}
		
	public function merk(){
		return $this->belongsTo('App\Merk');
		}
		
	public function group(){
		return $this->belongsToMany('App\Group');
		}
} 