<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Product::paginate(20);
        return view('product.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
        'name'                   => 'required',
        'price'                  => 'required',
        'color'                  => 'required',
        'store_size'             => 'required',
        'description'             => 'required',
        'category_id'            => 'required'
        ];
        $message=[
        'name.required'                   => 'Name Is Required',
        'price.required'                  => 'Price Is Required',
        'image.required'                  => 'Image Is Required',
        'color.required'                  => 'Color Is Required',
        'store_size.required'             => 'Store Size Is Required',
        'description.required'             => 'Description Is Required',
        'category_id.required'            => ' Category Id required'
        ];
        $this->validate($request , $rules ,$message);
        $record=Product::create([
        'name'=>$request->name,
        'price'=>$request->price,
        'color'=>$request->color,
        'store_size'=>$request->store_size,
        'description'=>$request->description,
        'category_id'=>$request->category_id
        ]);

        if ($request->hasFile('image'))
            {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $name = time().''.rand(11111,99999).'.'.$extension; 
            $image->move('uploads/products/images/',$name); 
            $record->image = $name;
            $record->update(['image'=>$name]);
          }

        flash()->success("Success");
        return redirect(route('product.index'));


 }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);
        return view('product.edit',compact('model'));
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
        $record = Product::findOrFail($id);
        $record->update($request->all());
        flash()->success("Edited");
        return redirect(route('product.index',$record->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $record = Product::findOrFail($id);
      $record->delete();
      flash()->success("Deleted");
      return back();
    }
}
