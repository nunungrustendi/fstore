<?php

namespace App\Http\Controllers;

use Validator;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Gambar;

class gambarController extends Controller
{
  
public function __construct()
		{
		$this->middleware('is_admin');
		}
		
	public function index(Request $request)
		{
			$gbr=Gambar::all();
			return view('admin.index_gambar')->with('gbr',$gbr);
		}
		
	public function formShow()
		{	//-------------------------------------------------//
			//--------------Membuat Data MERK Baru-------------//
			//-------------------------------------------------//
			$gbr=new Gambar;
			return view('admin.form_gambar')
					->with('gbr',$gbr)
					->with('method','post')
					->with('url','admin/gambar/store');
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
			
			$gbr=Gambar::create($request->all());
			
			if($request->has('gambar'))//-----Jika Input FORM memiliki field gambar, maka SIMPAN GAMBAR-------//
				{
					//Manipulasi ukuran/resize Gambar
					$imgfile=$request->file('gambar');
					$img=Image::make($imgfile->getRealPath());
					$img->resize(800,300)->encode();
					//end of resize
					
					//$path=Storage::putFile($folder,$request->file('gambar'));//Simpan gambar
					$folder='gambarProduk/';					
					$path=$folder.$imgfile->hashName();//path file gambar lengkap beserta nama file
					Storage::put($path,$img);//Simpan gambar yang telah di-resize
					$gbr->gambar=$path;
				}			
			$gbr->save();
			return redirect('admin/gambar');
		}
		
	public function update(Request $request,$id)
		{//FUNGSI UNTUK MENGUPDATE/EDIT DATA MERK
			$gbr=Gambar::find($id); //Merk yang akan diupdate
			if($request->isMethod('get'))
				 return view('admin.form_gambar')
									->with('gbr',$gbr)
									->with('method','put')
									->with('url','admin/gambar/update/'.$id);
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
					
					$old=$gbr;	
					if($request->has('gambar'))
						{
							Storage::delete($old->gambar);	//hapus file gambar sebelumnya
							//UPDATE DATA
							$gbr->update($request->all());
							
							//update gambar
							
							//Manipulasi ukuran/resize Gambar
								$imgfile=$request->file('gambar');			// file gambar dari form input
								$img=Image::make($imgfile->getRealPath());	//buat objek gambar
								$img->resize(800,300)->encode();			//ubah/resize ukuran gambar
								//end of resize
								
								 
								$folder='gambarProduk/';					//Folder tempat menyimpan gambar					
								$path=$folder.$imgfile->hashName();			//path file gambar lengkap; nama path/folder beserta nama file
								Storage::put($path,$img);					//Simpan file gambar yang telah di-resize ke disk
								$gbr->gambar=$path;							//simpan nama gambar pada tabel database
							
							//end update gambar
								
						}
						else
						{
							$gbr->update($request->except('gambar'));//update data tabel kecuali gambar karena tidak berubah
						}
						
					$gbr->save();// simpan data ke tabel database
				}
			return redirect('admin/gambar');
		}
	
		
	public function destroy(Request $request,$id)
		{			
			$gbr=Gambar::find($id);

			Storage::delete($gbr->gambar);
			$gbr->delete();
			return redirect('admin/gambar');
		}

  //
}
