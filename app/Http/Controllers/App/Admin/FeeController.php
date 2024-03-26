<?php

namespace App\Http\Controllers\app\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fee;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::all();

        return view('app.admin.fees.index', ['fees' =>  $fees]);
    }

    public function create()
    {
        return view('app.admin.fees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'shortname' => 'required',
            'description' => 'required',
            'amountdue' => 'required',
            'amountbalance' => 'required',
        ]);

        $newFee = Fee::create($data);

        return redirect(route('app.admin.fees.index'))->with('status', 'Fee has been succesfully added!');
    }

    public function destroy(Request $request, Fee $fee)
    {
        $fee->delete();

        return redirect(route('app.admin.fees.index'))->with('status', 'Fee has been succesfully deleted!');
    }

    public function modify(Fee $fee)
    {
        return view('app.admin.fees.modify', ['fee' => $fee]);
    }

    public function update(Request $request, Fee $fee)
    {
        $data = $request->validate([
            'shortname' => 'required',
            'description' => 'required',
            'amountdue' => 'required',
            'amountbalance' => 'required',
        ]);

        $fee->update($data);

        return redirect(route('app.admin.fees.index'))->with('status', 'Fee  has been succesfully updated!');
    }
}
