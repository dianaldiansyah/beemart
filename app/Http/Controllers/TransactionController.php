<?php

namespace App\Http\Controllers;

use DB;
use Response;
use Session;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {

        $data = DB::table('transaction')
                    ->select('transaction.id', 'transaction.qty', 'product.name AS product_name', 'product.price_sell AS product_price','customer.name AS customer_name', 'staff.name AS staff_name')
                    ->leftJoin('customer','customer.id','=','transaction.customer_id')
                    ->leftJoin('product','product.id','=','transaction.product_id')
                    ->leftJoin('staff','staff.id','=','transaction.staff_id')
                    ->get();
    
        return view('pages.transaction.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 100);
    }
}
