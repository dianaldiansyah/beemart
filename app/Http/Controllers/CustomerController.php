<?php

namespace App\Http\Controllers;
use Response;
use Session;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $data = Customer::latest()->paginate(100);
        return view('pages.customer.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create() {
        return view('pages.customer.create');
    }

    public function edit($customerId = null) {
        $data['customers'] = Customer::find($customerId)->first();
        return view('pages.customer.update', $data);
    }

    public function store(Request $request) {
        try{
            $file_name = time() . '.' . request()->id_Card->getClientOriginalExtension();
            request()->id_Card->move(public_path('img/customer'), $file_name);
    
            $customer = new Customer;
            $customer->type_id = $request->type;
            $customer->name = $request->name;
            $customer->description = $request->description;
            $customer->stock = $request->stock;
            $customer->price_buy = $request->price_buy;
            $customer->price_sell = $request->price_sell;
            $customer->id_Card = $id_Card;
            
            if ($customer->save()) {
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
            $id_Card = $request->id_Card_old;
            if($request->id_Card != '')
            {
                $id_Card = time() . '.' . request()->id_Card->getClientOriginalExtension();
                request()->id_Card->move(public_path('img/customer'), $id_Card);
            }

            $customer = Customer::find($request->id);
            $customer->name = $request->name;
            $customer->description = $request->description;
            $customer->stock = $request->stock;
            $customer->price_buy = $request->price_buy;
            $customer->price_sell = $request->price_sell;
            $customer->id_Card = $id_Card;
            
            if ($customer->save()) {
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
