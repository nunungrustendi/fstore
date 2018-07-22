<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Kategori;

class categoryController extends Controller
{
    public function __construct()
		{$this->middleware('is_admin');
		}
		
	public function index(Request $request)
		{
			$categories=Kategori::all();
			return view('admin.index_categori')->with('categories',$categories);
		}
		
	public function formShow()
		{//---------------------------------------------------------------//
		 //-----------Menampilkan FORM untuk membuat kategori produk baru
		 //---------------------------------------------------------------//
			$kategori=new Kategori;
			return view('admin.form_categori')
					->with('kategori',$kategori)			//---Instance objek model Kategori
					->with('method','post')					//---Metode yang akan digunakan oleh form
					->with('url','admin/category/store');	//---URL yang akan menerima data kategori baru yang dikirim FORM
		}
		
	public function store(Request $request)
		{	//------------------------------------------------------------------//
			//---------Menyimpan data kategori baru dari FORM ------------------//
			//------------------------------------------------------------------//
			
			//-----Chek validasi input data dari FORM----//
			$validator=Validator::make($request->all(),[
					'nama'=>'required|max:100',
					'gambar'=>'image'
					]);
			if($validator->fails())//---------Data input Form gagal divalidasi (ada data yang tidak sesuai)-------
				{
					return back()//--------------Kembali ke halaman sebelumnya-----------
							->withErrors($validator)
							->withInput();
				 }
			//-------------------END OF VALIDATION---------------------------//
			
			$categ=Kategori::create($request->all());
			//----------------simpan gambar
			if($request->has('gambar'))
				{	$folder='gambarProduk';
					$path=Storage::putFile($folder,$request->file('gambar'));
					$categ->gambar=$path;	
					}
			$categ->save();
			return redirect('admin/category');
		}
	
	public function update(Request $request,$id)
		{
			$kategori=Kategori::find($id);
			$old=$kategori;
			if($request->isMethod('get'))
				 return view('admin.form_categori')
									->with('kategori',$kategori)
									->with('method','put')
									->with('url','admin/category/update/'.$id);
			elseif($request->isMethod('put'))
				{
					//-----CHECK INPUT VALIDATION----//
					$validator=Validator::make($request->all(),[
							'nama'=>'required|max:100',
							'gambar'=>'image'
							]);
					if($validator->fails())
						{
							return back()
								->withErrors($validator)
								->withInput();
						 }
					//---END OF VALIDATION----//
					
					
					if($request->has('gambar'))
						{$kategori->update($request->all());
						//update gambar
						//delete gambar sebelumnya
						Storage::delete($old->gambar);
						$folder='gambarProduk';
						$path=Storage::putFile($folder,$request->file('gambar'));
						$kategori->gambar=$path;	
						}
					else
						{//GAMBAR TIDAK BERUBAH
							$kategori->update($request->except('gambar'));
						}
				
					$kategori->save();
				 }
				
			return redirect('admin/category');
		}
	
	public function destroy(Request $request,$id)
		{	$kategori=Kategori::find($id);
			//$kategori->produk()->dissociate();
			foreach($kategori->produk as $prod)
				{
					$prod->kategori()->dissociate();
					$prod->save();
				}
			$kategori->load('produk');
			$kategori->save();
			
			Storage::delete($kategori->gambar);
			$kategori->delete();
			return redirect('admin/category');
		}
    ////
}
