<?php

namespace App\Http\Controllers;

use Response;
use Session;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $data = Product::latest()->paginate(100);
        return view('pages.product.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create() {
        return view('pages.product.create');
    }

    public function edit($productId = null) {
        $data['products'] = Product::find($productId)->first();
        return view('pages.product.update', $data);
    }

    public function store(Request $request) {
        try{
            $file_name = time() . '.' . request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('img/product'), $file_name);
    
            $product = new Product;
            $product->type_id = $request->type;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->price_buy = $request->price_buy;
            $product->price_sell = $request->price_sell;
            $product->photo = $photo;
            
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
            $photo = $request->photo_old;
            if($request->photo != '')
            {
                $photo = time() . '.' . request()->photo->getClientOriginalExtension();
                request()->photo->move(public_path('img/product'), $photo);
            }

            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->stock = $request->stock;
            $product->price_buy = $request->price_buy;
            $product->price_sell = $request->price_sell;
            $product->photo = $photo;
            
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
}
