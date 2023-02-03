<?php

namespace App\Http\Controllers;
use Response;
use Session;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() {
        $data = Staff::latest()->paginate(100);
        return view('pages.staff.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 100);
    }

    public function create() {
        return view('pages.staff.create');
    }

    public function edit($staffId = null) {
        $data['staff'] = Staff::find($staffId)->first();
        return view('pages.staff.update', $data);
    }

    public function store(Request $request) {
        try{
    
            $staff = new Staff;
            $staff->type_id = $request->type;
            $staff->name = $request->name;
            $staff->description = $request->description;
            $staff->stock = $request->stock;
            $staff->price_buy = $request->price_buy;
            $staff->price_sell = $request->price_sell;
            
            if ($staff->save()) {
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

            $staff = Staff::find($request->id);
            $staff->name = $request->name;
            $staff->description = $request->description;
            $staff->stock = $request->stock;
            $staff->price_buy = $request->price_buy;
            $staff->price_sell = $request->price_sell;
            
            if ($staff->save()) {
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
