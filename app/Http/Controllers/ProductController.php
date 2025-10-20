<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\StockEntry;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',['products'=>$products] );
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
       $validated = $request->validate([
           'name' => 'required|string',
           'purchase_price' => 'required|integer',
           'sale_price' => 'required|integer',
           'quantity' => 'required|integer',
       ]);
       Product::create($validated);
       return redirect('/products');
    }
    public function sell(){
        $products = Product::all();
        return view('products.sell',['products'=>$products]);
    }
    public function storeSell(Request $request){

        //request date and make validation
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'upload_image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        //Quantaty after sell
        $product = Product::findOrFail($validated['product_id']);
        if($product->quantity<request('quantity')){
            return redirect('/products')->with('error','sorry quantity is not enough');
        }
        $product->quantity -= request('quantity');
        $product->save();

        //upload image
        $image = null;
        if ($request->hasFile('upload_image')) {
            $image = $request->file('upload_image')->store ('uploads', 'public');
        }
        Sale::create([
            'customer_name' => $validated['customer_name'],
            'product_id' => $product->id,
            'quantity' => $validated['quantity'],
            'image' => $image,
            'user_id' => auth()->id(),
        ]);
        return redirect('/sales')->with('success','product added successfully');
    }
    public function sales(){
        $sales = Sale::with('product','user')->latest()->get();
        return view('products.sales',['sales'=>$sales]);

    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
    public function addStockForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.update', compact('product'));
    }

    public function storeStock(Request $request, $id)
    {
        $request->validate([
            'added_quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);
        $product->quantity += $request->added_quantity;
        $product->save();
        StockEntry::create([
            'product_id' => $product->id,
            'added_quantity' => $request->added_quantity,
        ]);

        return redirect()->route('products.index')->with('success','Added successfully');
    }
    public function stockEntries()
    {
        $entries = StockEntry::with('product')->latest()->get();
        return view('products.stocklist', compact('entries'));
    }
    public function print($id){
        $sale = Sale::with('product')->findOrFail($id);
        return view('products.print', compact('sale'));
    }
}
