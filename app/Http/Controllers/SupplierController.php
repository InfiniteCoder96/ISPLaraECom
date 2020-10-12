<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function create()
    {
        return view('admin.suppliers.create');
    }


    public function store(Request $request)
    {
        $supplier = $this->validate(request(), [
            'name' => 'required',
            'nic' => 'required',
            'email' => 'required',
            'pno' => 'required|numeric',
            'address' => 'required',

        ]);

        Supplier::create($supplier);

        return back()->with('success', 'Supplier has been added');;
    }

    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.suppliers.index', compact('suppliers'));

    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.suppliers.edit',compact('supplier','id'));
    }


    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'nic' => 'required|',
            'email' => 'required',
            'pno' => 'required|numeric',
            'address' => 'required',


        ]);
        $supplier->name = $request->get('name');
        $supplier->nic = $request->get('nic');
        $supplier->email = $request->get('email');
        $supplier->pno = $request->get('pno');
        $supplier->address = $request->get('address');
        $supplier->save();
        return redirect('./suppliers')->with('success','Supplier has been updated');
    }


    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('./suppliers')->with('success','Supplier has been  deleted');
    }

    public function createPDF() {
        // retreive all records from db
        $data = Supplier::all();

        // share data to view
        view()->share('deliveries',$data);
        $pdf = PDF::loadView('admin.pdf.supplier_pdf', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }


}
