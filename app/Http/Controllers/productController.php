<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Validator;
Use Image;
use App\Produk;
use App\Merk;
use App\Kategori;


class productController extends Controller
{
	
	
	
	public function __construct()
		{
			$this->middleware('is_admin');
		
		}
		
		
	public function index(Request $request)
		{
			$product=Produk::paginate(10);
			return view('admin.index_product')->with('product',$product);
		}
		
	public function formShow()
		{
			//=======================================================================================
			//Tampilkan FORM Produk baru
			//=======================================================================================
			

			$merk=Merk::all();
			$categ=Kategori::all();
			if(count($merk)>0)
				{$merk_options=$merk->pluck('nama','id')->all();
				 }
			else
				{$merk_options=array(null=>"Tidak terspesifikasi");
				 }
			
			if(count($categ)>0)
				{$categ_options=$categ->pluck('nama','id')->all();
				 }
			else
				{$categ_options=array(null=>"Tidak terspesifikasi");
				 }			
			
			//========================================================================================
			//========================================================================================
			
						
			$product=new Produk;
			return view('admin.form_product')
					->with('product',$product)
					->with('method','post') 
					->with('url','admin/product/store')
					->with('categ_options',$categ_options)
					->with('merk_options',$merk_options);
	
		}
	
	protected function simpanGambar(Request $request,$gambar)
	{
		//Manipulasi ukuran/resize Gambar
			$imgfile=$request->file($gambar);			// file gambar dari form input
			$img=Image::make($imgfile->getRealPath());	//buat objek gambar
			$img->resize(700,700)->encode();			//ubah/resize ukuran gambar
			//end of resize
			
			 
			$folder='gambarProduk/';					//Folder tempat menyimpan gambar					
			$path=$folder.$imgfile->hashName();			//path file gambar lengkap; nama path/folder beserta nama file
			Storage::put($path,$img);					//Simpan file gambar yang telah di-resize ke disk
			return $path;							//simpan nama gambar pada tabel database
		
		//end update gambar
	}


	
	public function store(Request $request)
		{
			//-----CHECK INPUT VALIDATION----//
			$validator=Validator::make($request->all(),[
				'nama'=>'required|max:100',				'gambar1'=>'required|image',
				'harga_dasar'=>'numeric',				'harga_aktual'=>'numeric',
				//'rating'=>'numeric|digits_between:1,5',	'num_stock'=>'numeric',
				'num_view'=>'numeric',					//'num_sold'=>'numeric'
				]);
			if($validator->fails())
				{
					return back()
							->withErrors($validator)
							->withInput();
				 }
			//---END OF VALIDATION----//
			
			
			$product=Produk::create($request->all());
			//simpan gambar
			//$folder='gambarProduk';
			
			//check keberadaan file sebelum disimpan
			if($request->has('gambar1'))
			  {	$path=$this->simpanGambar($request,'gambar1');
				//$path=Storage::putFile($folder,$request->file('gambar1'));
				$product->gambar1=$path;
				}
			if($request->has('gambar2'))	
			  {	$path=$this->simpanGambar($request,'gambar2');
				//$path=Storage::putFile($folder,$request->file('gambar2'));
				$product->gambar2=$path;
				}
			if($request->has('gambar3'))					
			  {	$path=$this->simpanGambar($request,'gambar3');
				//$path=Storage::putFile($folder,$request->file('gambar3'));
				$product->gambar3=$path;
				}
			if($request->has('gambar4'))				
			  {	$path=$this->simpanGambar($request,'gambar4');
				//$path=Storage::putFile($folder,$request->file('gambar4'));
				$product->gambar4=$path;
				}
			if($request->has('gambar5'))			
			  {	$path=$this->simpanGambar($request,'gambar5');
				//$path=Storage::putFile($folder,$request->file('gambar5'));
				$product->gambar5=$path;
				}
			if($request->has('gambar6'))			
			  {	$path=$this->simpanGambar($request,'gambar6');
				//$path=Storage::putFile($folder,$request->file('gambar6'));
				$product->gambar6=$path;
				}
			
			$product->save();
			return redirect('admin/product');
			
		}
	


	
	public function update(Request $request,$id)
		{
			//=======================================================================================
			
			$merk=Merk::all();
			$categ=Kategori::all();
			if(count($merk)>0)
				{$merk_options=$merk->pluck('nama','id')->all();
				 }
			else
				{$merk_options=array(null=>"Tidak terspesifikasi");
				 }
			
			if(count($categ)>0)
				{$categ_options=$categ->pluck('nama','id')->all();
				 }
			else
				{$categ_options=array(null=>"Tidak terspesifikasi");
				 }			
			
			//========================================================================================
			

			$product=Produk::find($id);
			$old=$product;
			if($request->isMethod('get'))
				 return view('admin.form_product')
									->with('product',$product)
									->with('method','put')
									->with('url','admin/product/update/'.$id)
									->with('categ_options',$categ_options)
									->with('merk_options',$merk_options);
			elseif($request->isMethod('put'))
				{
				//-----CHECK INPUT VALIDATION----//
				$validator=Validator::make($request->all(),[
					'nama'=>'required|max:100',				'gambar1'=>'image',
					'harga_dasar'=>'numeric',				'harga_aktual'=>'numeric',
					//'rating'=>'numeric|digits_between:1,5',	'num_stock'=>'numeric',
					'num_view'=>'numeric',					//'num_sold'=>'numeric'
					]);
				if($validator->fails())
					{
						return back()
								->withErrors($validator)
								->withInput();
					 }
				//---END OF VALIDATION----//
					
					$product->update($request->all());
					//update gambar
					//$folder='gambarProduk';
					//check keberadaan file sebelum disimpan
					if($request->has('gambar1'))
					  {	if($old->gambar1!=null)Storage::delete($old->gambar1);
						$path=$this->simpanGambar($request,'gambar1');
						//$path=Storage::putFile($folder,$request->file('gambar1'));
						$product->gambar1=$path;
						}
					if($request->has('gambar2'))	
					  {	if($old->gambar2!=null)Storage::delete($old->gambar2);
						$path=$this->simpanGambar($request,'gambar2');
						//$path=Storage::putFile($folder,$request->file('gambar2'));
						$product->gambar2=$path;
						}
					if($request->has('gambar3'))					
					  {	if($old->gambar3!=null)Storage::delete($old->gambar3);
						$path=$this->simpanGambar($request,'gambar3');
						//$path=Storage::putFile($folder,$request->file('gambar3'));
						$product->gambar3=$path;
						}
					if($request->has('gambar4'))				
					  {	if($old->gambar4!=null)Storage::delete($old->gambar4);
						$path=$this->simpanGambar($request,'gambar4');
						//$path=Storage::putFile($folder,$request->file('gambar4'));
						$product->gambar4=$path;
						}
					if($request->has('gambar5'))			
					  {	if($old->gambar5!=null)Storage::delete($old->gambar5);
						$path=$this->simpanGambar($request,'gambar5');
						//$path=Storage::putFile($folder,$request->file('gambar5'));
						$product->gambar5=$path;
						}
					if($request->has('gambar6'))			
					  {	if($old->gambar6!=null)Storage::delete($old->gambar6);		
						$path=$this->simpanGambar($request,'gambar6');
						//$path=Storage::putFile($folder,$request->file('gambar6'));
						$product->gambar6=$path;
						}
					
					$product->save();
				}
			return redirect('admin/product');
		}
	
		
	public function destroy(Request $request,$id)
		{	
			$product=Produk::find($id);
			//------HAPUS GAMBAR--------------------//
			if($product->gambar1)Storage::delete($product->gambar1);
			if($product->gambar2)Storage::delete($product->gambar2);
			if($product->gambar3)Storage::delete($product->gambar3);
			if($product->gambar4)Storage::delete($product->gambar4);
			if($product->gambar5)Storage::delete($product->gambar5);
			if($product->gambar6)Storage::delete($product->gambar6);
			//-----------HAPUS RELATIONSHIP -----------//
			//Kategori relationship
			
			//Merk relationship
			
			//Delete Relationship GROUP and PRODUK
			foreach($product->group as $group)
			{
				$group->produk()->detach($id);
			}
			
			$product->delete();
			return redirect('admin/product');
			
			
		}
  //
}
