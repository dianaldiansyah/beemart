<?php

namespace App\Http\Controllers;

use Response;
use Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = Product::latest()->paginate(100);
        return view('pages.product.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create() {
        $data['types'] = ProductType::get();
        return view('pages.product.create', $data);
    }

    public function edit($productId = null) {
        $data['types'] = ProductType::get();
        $data['product'] = Product::find($productId);
        return view('pages.product.update', $data);
    }

    public function store(Request $request) {
        try{
            $file_name = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('img/product'), $file_name);
    
            $product = new Product;
            $product->type_id = $request->type;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->price_buy = $request->price_buy;
            $product->price_sell = $request->price_sell;
            $product->photo = $file_name;
            
            if ($product->save()) {
                return Response::json([
                    'error' => false, 
                    'msg' => 'Data berhasil disimpan'
                ]);
            } else {
                return Response::json([
                    'error' => true, 
                    'msg' => 'Data gagal disimpan'
                ]);
            }
        }catch(\Exception $e){
            return Response::json([
                'error' => true, 
                'msg' => $e
            ]);
        }
    }

    public function update(Request $request) {
        try{
            if($request->photo != '') {
                $photo = time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('img/product'), $request->photo);
            }

            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->type_id = $request->type;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->price_buy = $request->price_buy;
            $product->price_sell = $request->price_sell;

            if($request->photo != '') {
                $product->photo = $photo;
            }
            
            if ($product->save()) {
                return Response::json([
                    'error' => false, 
                    'msg' => 'Data berhasil diperbarui'
                ]);
            } else {
                return Response::json([
                    'error' => true, 
                    'msg' => 'Data gagal diperbarui'
                ]);
            }
        }catch(\Exception $e){
            return Response::json([
                'error' => true, 
                'msg' => $e
            ]);
        }
    }

    public function delete(Request $request) {
        $product = Product::find($request->id);
        $file = Storage::delete(public_path() . '/img/product/' . $product->photo);
        if($product->delete()) {
            return Response::json([
                'error' => false, 
                'msg' => 'Data berhasil dihapus'
            ]);
        } else {
            return Response::json([
                'error' => true, 
                'msg' => 'Data gagal dihapus'
            ]);
        };
    }
}
