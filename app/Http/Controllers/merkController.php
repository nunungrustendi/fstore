<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Merk;

class merkController extends Controller
{
  
public function __construct()
		{
		$this->middleware('is_admin');
		}
		
	public function index(Request $request)
		{
			$merk=Merk::all();
			return view('admin.index_merk')->with('merk',$merk);
		}
		
	public function formShow()
		{	//-------------------------------------------------//
			//--------------Membuat Data MERK Baru-------------//
			//-------------------------------------------------//
			$merk=new Merk;
			return view('admin.form_merk')
					->with('merk',$merk)
					->with('method','post')
					->with('url','admin/merk/store');
		}
		
	public function store(Request $request)
		{
			//----------------------CHECK INPUT VALIDATION---------------//
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
			//----------------------END OF VALIDATION---------------------//
			
			$merk=Merk::create($request->all());
			
			if($request->has('gambar'))//-----Jika Input FORM memiliki field gambar, maka SIMPAN GAMBAR-------//
				{
					//simpan gambar
					$folder='gambarProduk';
					$path=Storage::putFile($folder,$request->file('gambar'));
					$merk->gambar=$path;
				}			
			$merk->save();
			return redirect('admin/merk');
		}
		
	public function update(Request $request,$id)
		{//FUNGSI UNTUK MENGUPDATE/EDIT DATA MERK
			$merk=Merk::find($id); //Merk yang akan diupdate
			if($request->isMethod('get'))
				 return view('admin.form_merk')
									->with('merk',$merk)
									->with('method','put')
									->with('url','admin/merk/update/'.$id);
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
					
					$old=$merk;	
					if($request->has('gambar'))
						{
							Storage::delete($old->gambar);	//hapus file gambar sebelumnya
							//UPDATE DATA
							$merk->update($request->all());
							$folder='gambarProduk';
							$path=Storage::putFile($folder,$request->file('gambar'));
							$merk->gambar=$path;	
						}
						else
						{
							$merk->update($request->except('gambar'));
						}
						
					$merk->save();
				}
			return redirect('admin/merk');
		}
	
		
	public function destroy(Request $request,$id)
		{			
			
			$merk=Merk::find($id);

			foreach($merk->produk as $prod)
				{
					$prod->merk()->dissociate();
					$prod->save();
				}
			$merk->load('produk');
			$merk->save();
			
			Storage::delete($merk->gambar);
			$merk->delete();
			return redirect('admin/merk');
		}

  //
}
