<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\Category;


class ProductController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth')->except('show');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        return view('products.index',[
            'products'=>Product::orderBy('id','desc')->get()
        ]);  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();        

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest  $request)
    {   
        $product = Product::create($request->validated());

        if($request->hasFile('image'))
        {
            $product->image = $request->file('image')->store('public');

        }
        $product->save();


        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {         
            $product = Product::findOrFail($id);       
            return view('products.show',[
                'product'=>$product                 
            ]);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();  
                
        return view('products.edit', [
            'product'=>$product,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {   
        $product = Product::findOrFail($id);

        $product->image = $request->file('image')->store('public');

            $product->update([
            'category_id'=>request('category_id'),
            'name'=>request('name'),
            'description'=>request('description'),
            'price'=>request('price'),
            'priceRetail'=>request('priceRetail'),
            'stock'=>request('stock'),
            'offer'=>request('offer'),
            'date'=>request('date')
                       
        ]);

        return redirect()->route('product.show', $product);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('product.index');
    }
    
   
}