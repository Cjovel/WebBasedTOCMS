<?php

namespace App\Http\Controllers\app\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receipt;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'amountdue' => 'required',
            'amountpaid' => 'required',
            'change' => 'required',
        ]);

        $newReceipt = Receipt::create($data);

        return redirect(route('app.admin.receipts.index'))->with('status', 'Receipt has been succesfully added!');
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
            'amountdue' => 'required',
            'amountpaid' => 'required',
            'change' => 'required',
        ]);

        $receipt->update($data);

        return redirect(route('app.admin.receipts.index'))->with('status', 'Receipt has been succesfully updated!');
    }
}


