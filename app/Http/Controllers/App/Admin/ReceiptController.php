<?php

namespace App\Http\Controllers\app\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Fee;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipts = Receipt::all();

        return view('app.admin.receipts.index', ['receipts' =>  $receipts]);
    }

    public function create()
    {
        return view('app.admin.receipts.create');
    }

    public function store(Fee $fee, Request $request)
    {
        $data = $request->validate([
            'Shortname' =>'required',
            'AmountDue' => 'required',
            'AmountPaid' => 'required',
            'Change' => 'required',
        ]);

        $newReceipt = $fee->receipts()->create($data);

        return redirect(route('home.show', ['fee' => $fee]));
    }
    

 
    public function destroy(Request $request, Receipt $receipt)
    {
        $receipt->delete();

        return redirect(route('app.admin.receipts.index'))->with('status', 'Receipt has been succesfully deleted!');
    }

    public function modify(Receipt $receipt)
    {
        return view('app.admin.receipts.modify', ['receipt' => $receipt]);
    }

    public function update(Request $request, Receipt $receipt)
    {
        $data = $request->validate([
            'shortname' => 'required',
            'amountdue' => 'required',
            'amountpaid' => 'required',
            'change' => 'required',
        ]);

        $receipt->update($data);

        return redirect(route('app.admin.receipts.index'))->with('status', 'Receipt has been succesfully updated!');
    }
}


