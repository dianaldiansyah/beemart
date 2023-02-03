<?php

namespace App\Http\Controllers;

use Response;
use Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $data['customer'] = Customer::find($customerId);
        return view('pages.customer.update', $data);
    }

    public function store(Request $request) {
        try{
            $file_name = time() . '.' . $request->id_card->getClientOriginalExtension();
            $request->id_card->move(public_path('img/id_card'), $file_name);
    
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->birth_date = $request->birth_date;
            $customer->gender = $request->gender;
            $customer->address = $request->address;
            $customer->username = $request->username;
            $customer->password = bcrypt($request->password);
            $customer->id_card = $file_name;
            
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
                'msg' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request) {
        try{
            if($request->id_card != '')
            {
                $id_card = time() . '.' . $request->id_card->getClientOriginalExtension();
                $request->id_card->move(public_path('img/id_card'), $id_card);
            }
            
            $customer = Customer::find($request->id);
            $customer->name = $request->name;
            $customer->birth_date = $request->birth_date;
            $customer->gender = $request->gender;
            $customer->address = $request->address;
            $customer->username = $request->username;

            if ($request->password != '') {
                $customer->password = bcrypt($request->password);
            }
            if($request->id_card != '') {
                $customer->id_card = $id_card;
            }
            
            if ($customer->save()) {
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
                'msg' => $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request) {
        $customer = Customer::find($request->id);
        $file = Storage::delete(public_path() . '/img/customer/' . $customer->id_card);
        if($customer->delete()) {
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
