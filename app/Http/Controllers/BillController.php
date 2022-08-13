<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Details;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;

class BillController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->id != '3') {
            $userId = Auth::user()->id;
            $bills = Bill::where('users_id', $userId)->get();
        } else {
            $bills = Bill::all();
        }

        return view('admin.bills.index', ['bills' => $bills]);
    }

    public function billdetails($id)
    {
        $bill = Bill::find($id);
        return view('admin.bills.billdetails', ['billdetails' => $bill]);
    }

    public function update($id)
    {
        $users = User::all();
        $bill = Bill::find($id);
        return view('admin.bills.update', ['bill' => $bill, 'users' => $users]);
    }

    public function updateBill(Request $request, $id)
    {
        $data['users_id'] = $request->user_id;
        $data['order'] = $request->order;
        $data['address'] = $request->address;
        $data['totalmoney'] = $request->totalmoney;
        Bill::where('id', $id)->update($data);
        return redirect()->route('bills');
    }

    public function deleteBill($id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->route('bills');
    }

    public function updatedetails($id)
    {
        $products = Product::all();
        $billdetails = Details::find($id);
        return view('admin.Bills.updatedetails', ['billdetails' => $billdetails, 'products' => $products]);
    }

    public function updateBillDetails(Request $request, $id)
    {
        $data['size'] = $request->size;
        $data['color'] = $request->color;
        $data['number'] = $request->number;
        Details::where('id', $id)->update($data);
        $d = Details::find($id);
        $b = $d->bill_id;
        return redirect()->route('billdetails', $b);
    }

    public function deletedetails($id)
    {
        $details = Details::find($id);
        $details->delete();
        return redirect()->route('bills');
    }
}