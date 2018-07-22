<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Group;
use App\Produk;

class groupController extends Controller
{
  
public function __construct()
		{
		$this->middleware('is_admin');
		}
		
	public function index(Request $request)
		{
			$group=Group::all();
			return view('admin.index_group')->with('group',$group);
		}
		
	public function formShow()
		{
			$group=new Group;
			$products=Produk::all();
			return view('admin.form_group')
					->with('group',$group)
					->with('products',$products)
					->with('method','post')
					->with('url','admin/group/store');
		}
		
	public function store(Request $request)
		{
			//-------------------------------------------------------CHECK INPUT VALIDATION----//
			$validator=Validator::make($request->all(),[
					'nama'=>'required|max:100',
					'gambar'=>'image',
					]);
			if($validator->fails())
				{
					return back()
							->withErrors($validator)
							->withInput();
				 }
			//--------------------------------------------------------END OF VALIDATION----//
			
			$group=Group::create($request->all());		
			//Anggota group handling TESSSS
			$group->produk()->attach($request->get('member'));
			//End of anggota group handling

			//simpan gambar
			if($request->has('gambar'))
				{	$folder='gambarProduk';
					$path=Storage::putFile($folder,$request->file('gambar'));
					$group->gambar=$path;	
				}
			$group->save();
			return redirect('admin/group');
		}
		
	public function update(Request $request,$id)
		{//FUNGSI UNTUK MENGUPDATE/EDIT DATA GROUP PRODUK
			$group=Group::find($id); //group yang akan diupdate
			if($request->isMethod('get'))
				 return view('admin.form_group')
									->with('group',$group)
									->with('products',Produk::all())
									->with('method','put')
									->with('url','admin/group/update/'.$id);
			elseif($request->isMethod('put'))
				{	
					//-----CHECK INPUT VALIDATION----//
					$validator=Validator::make($request->all(),[
							'nama'=>'required|max:100',
							'gambar'=>'nullable|image',
							'display_on_home'=>'required'
							]);
					if($validator->fails())
						{	return back()
								->withErrors($validator)
								->withInput();
						 }
					//---END OF VALIDATION----//
					
					
					$old=$group;	
				
					if(!($request->has('gambar')))
						{//GAMBAR TIDAK BERUBAH
							$group->update($request->except('gambar'));
						}
					else
						{//GAMBAR BERUBAH
							Storage::delete($old->gambar);	//hapus file gambar sebelumnya
							//UPDATE DATA
							$group->update($request->all());
							$folder='gambarProduk';
							$path=Storage::putFile($folder,$request->file('gambar'));
							$group->gambar=$path;	
						}
					$group->produk()->sync($request->get('member'));
					$group->save();
				}
			return redirect('admin/group');
		}
	
		
	public function destroy(Request $request,$id)
		{	$group=Group::find($id);
			Storage::delete($group->gambar);
			$group->produk()->detach();
			$group->delete();
			return redirect('admin/group');
		}

  //
}
