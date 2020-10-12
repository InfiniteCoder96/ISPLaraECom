<?php

namespace App\Http\Controllers;

use App\BillingInfo;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $user_id = Auth::id();
        $cart_products = Cart::all()->where('user_id', '=', $user_id);

        return view('store.checkOut', compact('cart_products'));
    }

    public function store(Request $request){
        request()->validate([
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'zipCode' => 'required|numeric',
            'paymentType' => 'required'
        ]);

        $user_id = Auth::id();
        $cart_products = Cart::all()->where('user_id', '=', $user_id);

        if(sizeof($cart_products)){
            $orderID = $this->getLatestOrderId() ? $this->getLatestOrderId() + 1 : 1;

            foreach ($cart_products as $product){
                $order = new Order();
                $order->order_id = $orderID;
                $order->user_id = $user_id;
                $order->product_id = $product->Products->id;
                $order->quantity = $product->quantity;
                $order->save();
                $product->delete();
            }

            $billing_info = new BillingInfo();

            $billing_info->order_id = $orderID ;
            $billing_info->fName = $request->fName;
            $billing_info->lName = $request->lName;
            $billing_info->email = $request->email;
            $billing_info->phone = $request->phone;
            $billing_info->address = $request->address;
            $billing_info->postal_code = $request->zipCode;
            $billing_info->paymentType = $request->paymentType;

            $billing_info->save();

            return redirect()->route('checkout')->with('success','Your order has been placed successfully');
        }

        return redirect()->route('checkout')->with('error','Your cart is empty');

    }


    public function getLatestOrderId(){
        Order::max('order_id');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $data = Order::all();

        // share data to view
        view()->share('orders',$data);
        $pdf = PDF::loadView('admin.pdf.orders_pdf', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
