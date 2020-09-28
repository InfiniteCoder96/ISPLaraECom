<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function create()
    {
        return view('admin.deliveries.create');
    }


    public function store(Request $request)
    {
        $delivery = $this->validate(request(), [
            'pname' => 'required',
            'cname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'pno' => 'required|numeric',

        ]);

        Delivery::create($delivery);

        return back()->with('success', 'Delivery has been added');
    }

    public function index()
    {
        $deliveries = Delivery::all();
        return view('admin.deliveries.index', compact('deliveries'));
    }

    public function edit($id)
    {
        $delivery = Delivery::find($id);
        return view('admin.deliveries.edit',compact('delivery','id'));
    }


    public function update(Request $request, $id)
    {
        $delivery = Delivery::find($id);
        $this->validate(request(), [
            'pname' => 'required',
            'cname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'pno' => 'required|numeric',
        ]);

        $delivery->pname = $request->get('pname');
        $delivery->cname = $request->get('cname');
        $delivery->email = $request->get('email');
        $delivery->address = $request->get('address');
        $delivery->pno = $request->get('pno');
        $delivery->save();
        return redirect('./deliveries')->with('success','Delivery has been updated');
    }

    public function destroy($id)
    {
        $delivery = Delivery::find($id);
        $delivery->delete();
        return redirect('./deliveries')->with('success','Delivery has been  deleted');
    }
}
