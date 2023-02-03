<?php

namespace App\Http\Controllers;
use Response;
use Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $data['staff'] = Staff::find($staffId);
        return view('pages.staff.update', $data);
    }

    public function store(Request $request) {
        try{
            $staff = new Staff;
            $staff->name = $request->name;
            $staff->gender = $request->gender;
            $staff->username = $request->username;
            $staff->password = bcrypt($request->password);
            
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
                'msg' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request) {
        try{
            $staff = Staff::find($request->id);
            $staff->name = $request->name;
            $staff->gender = $request->gender;
            $staff->username = $request->username;

            if ($request->password != '') {
                $staff->password = bcrypt($request->password);
            }
            
            if ($staff->save()) {
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
        $staff = Staff::find($request->id);
        if($staff->delete()) {
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
