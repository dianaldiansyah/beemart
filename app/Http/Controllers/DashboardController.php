<?php

namespace App\Http\Controllers;

use DB;
use Session;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data['total_transaction_staff'] = Transaction::where('staff_id', Session::get('account_id'))->count();
        $data['total_transaction'] = Transaction::count();
        $data['total_product'] = Product::count();
        $data['total_customer'] = Customer::count();
        $data['transactions'] = DB::table('transaction')
                                    ->select('transaction.id', 'transaction.qty', 'product.name AS product_name', 'product.price_sell AS product_price','customer.name AS customer_name', 'staff.name AS staff_name')
                                    ->leftJoin('customer','customer.id','=','transaction.customer_id')
                                    ->leftJoin('product','product.id','=','transaction.product_id')
                                    ->leftJoin('staff','staff.id','=','transaction.staff_id')
                                    ->take(1)
                                    ->get();

        return view('pages.dashboard.index', $data);
    }

}
