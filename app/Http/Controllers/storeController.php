<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Merk;
use App\Group;
use App\Gambar;
use Cart;

class storeController extends Controller
{
    public function __construct()
		{
		
		}
		
		
	public function displayHome(Request $request)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$group=Group::all();//Produk
			$product=Produk::paginate(8);//Produk
			$gbr=Gambar::all();
			$caption="Semua Produk";
		
			return view('store.store_home1')
					->with('gbr',$gbr)
					->with('categories',$categories)
					->with('merk',$merk)
					->with('group',$group)
					->with('product',$product)
					->with('caption',$caption);
		}
		
		
	public function displaySingleProduct(Request $request,$id)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$product=Produk::findOrFail($id);
			if($product)
				{	$product->num_view++;
					$product->save();
					if($product->kategori)
						{	$cate=$product->kategori;
							$cateid=$cate->id;
							$prod=Kategori::findOrFail($cateid)->produk;
						}
					else
						{	$prod=null;
						}
					return view('store.store_produk')
							->with('categories',$categories)
							->with('merk',$merk)
							->with('prod',$prod)
							->with('product',$product);
				
				}
			else 
				{
					return back();
				}
		}

	public function displayCategoryProduct(Request $request,$id)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$product=Kategori::findOrFail($id)->produk()->paginate(8);
			$title=Kategori::findOrFail($id)->nama;
			return view('store.store_kategori1')
						->with('categories',$categories)
						->with('merk',$merk)
						->with('product',$product)
						->with('title',$title);
		}
		
	public function displayGroupProduct(Request $request,$id)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$product=Group::findOrFail($id)->produk()->paginate(8);
			$title=Group::findOrFail($id)->nama;
			return view('store.store_group')
						->with('categories',$categories)
						->with('merk',$merk)
						->with('product',$product)
						->with('title',$title);
		}
		
	public function displayMerkProduct(Request $request,$id)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$product=Merk::findOrFail($id)->produk()->paginate(8);
			$title=Merk::findOrFail($id)->nama;
			return view('store.store_merk')
						->with('categories',$categories)
						->with('merk',$merk)
						->with('product',$product)
						->with('title',$title);
		}
	
	public function displayCaraPesan(Request $request)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			return view('store.store_howtoorder')
					->with('categories',$categories)
					->with('merk',$merk);
		}
		
	public function displayFAQ(Request $request)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			return view('store.store_faq')
									->with('categories',$categories)
									->with('merk',$merk);
		}
	
	public function displayAbout(Request $request)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$gbr=Gambar::all();
			return view('store.store_about')
					->with('gbr',$gbr)
					->with('categories',$categories)
					->with('merk',$merk);
		}
		
		
	public function searchResult(Request $request)
		{
				$categories=Kategori::all();//Kategori produk
				$merk=Merk::all();
				if(!isset($request->cari))
					{return back();}
				$cari=$request->input('cari');
				$product=Produk::where('nama','like','%'.$cari.'%')->paginate(8);
				return view('store.store_search')
						->with('categories',$categories)
						->with('merk',$merk)
						->with('product',$product)
						->with('title',$cari);
		}
	
public function displayDiskonProduct()
		{
				$categories=Kategori::all();//Kategori produk
				$merk=Merk::all();
				$product=Produk::whereRaw('harga_dasar>harga_aktual')->paginate(8);
				$title="Produk Discount";
				return view('store.store_diskon')
						->with('categories',$categories)
						->with('merk',$merk)
						->with('product',$product)
						->with('title',$title);
		}	
	
	
	public function addToCart($id)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$prod=Produk::findOrFail($id);
			Cart::add($prod->id,$prod->nama,1,$prod->harga_aktual,[]);
			$product=Cart::content();
			$total=Cart::subtotal();
			return view('store.store_cart')
					->with('product',$product)
					->with('categories',$categories)
					->with('total',$total)
					->with('merk',$merk);
					
		}
	
	public function viewCart()
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			$product=Cart::content();
			$total=Cart::subtotal();
			return view('store.store_cart')
					->with('product',$product)
					->with('categories',$categories)
					->with('total',$total)
					->with('merk',$merk);
					
		}
		
	public function orderCart()
		{
			$product=Cart::content();
			if($product->count()>0)
			{
				$pesan="Saya%20pesan%20produk:%0d";
				foreach($product as $pr)
					{
						$pesan=$pesan.$pr->name.'%20'.'('.$pr->qty.')'.'%0d';
					}
				return redirect('https://wa.me/6281324507224?text='.$pesan);
			}
			else
			{return back();	}
					
		}	
		//
	public function deleteCartItem($id)
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			
			if(Cart::get($id))
				{Cart::remove($id);}
						
			$product=Cart::content();
			$total=Cart::subtotal();
			return view('store.store_cart')
					->with('product',$product)
					->with('categories',$categories)
					->with('total',$total)
					->with('merk',$merk);
					
		}
	
	public function deleteCart()
		{
			$categories=Kategori::all();//Kategori produk
			$merk=Merk::all();
			Cart::destroy();
			$product=Cart::content();
			$total=Cart::subtotal();
			return view('store.store_cart')
					->with('product',$product)
					->with('categories',$categories)
					->with('total',$total)
					->with('merk',$merk);
					
		}
	
		//
}	
