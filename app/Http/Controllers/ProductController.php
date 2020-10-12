<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.products.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sub_image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sub_image_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $storePath = 'store/img/products/';

        $mainImageName = $request->name.'_main'.'.'.$request->main_image->extension();
        $request->main_image->move(public_path('store/img/products'), $mainImageName);

        $subImageName1 = $request->name.'_sub_1'.'.'.$request->sub_image_1->extension();
        $request->sub_image_1->move(public_path('store/img/products'), $subImageName1);

        $subImageName2 = $request->name.'_sub_2'.'.'.$request->sub_image_2->extension();
        $request->sub_image_2->move(public_path('store/img/products'), $subImageName2);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->main_image = $storePath . $mainImageName;
        $product->sub_image_1 = $storePath . $subImageName1;
        $product->sub_image_2 = $storePath . $subImageName2;

        $product->save();

        return redirect()->route('products.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success','Product deleted successfully');
    }

    public function createPDF() {
        // retreive all records from db
        $data = Product::all();

        // share data to view
        view()->share('products',$data);
        $pdf = PDF::loadView('admin.pdf.product_pdf', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
