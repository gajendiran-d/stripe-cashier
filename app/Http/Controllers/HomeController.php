<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function checkout($id)
    {
        $products = Product::where('id', $id)->first();
        $user = Auth::user();
        return view('checkout', ['products' => $products, 'intent' => $user->createSetupIntent()]);
    }

    public function payment(Request $request)
    {
        try {
            $amount = $request->amount;
            $amount = $amount * 100;
            $paymentMethod = $request->payment_method;
            $user = Auth::user();
            $user->createOrGetStripeCustomer();
            $paymentMethod = $user->addPaymentMethod($paymentMethod);
            $user->charge($amount, $paymentMethod->id);
            return redirect()->route('home')->with('success', 'Payment completed successfully!');
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }
}
