<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::latest()->paginate(5);



        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('file_uploads'))
        {
            $file=$request->file_uploads;
            $file_name=$file->getClientoriginalName();
            $file->move(public_path('uploads'),$file_name);

        }
        $request->merge(['image'=>$file_name]);
        $request->validate([
            'name'=>'required',
            'prioty'=>'required',
            'description'=>'required',


        ],
        [
            'name.required'=>'chua nhap ten',
            'prioty.required'=>'thu tu uu tien ko de trong'
        ]
        );
        Product::create($request->all());

        return redirect()->route('product.index')
                        ->with('success','product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats=Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.edit',compact('product','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->has('file_uploads'))
        {
            $file=$request->file_uploads;
            $file_name=$file->getClientoriginalName();
            $file->move(public_path('uploads'),$file_name);

        }
        $request->merge(['image'=>$file_name]);
        $request->validate([
            'name'=>'required|unique:product',
            'prioty'=>'required',

        ],
        [
            'name.required'=>'chua nhap ten',
            'prioty.required'=>'thu tu uu tien ko de trong',
        ]
        );
        $product->update($request->all());

        return redirect()->route('product.index')
                        ->with('success','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

            if($product->details()->count()>0)
            {
                return  redirect()->route('product.index')->width('error','khong the xoa don nay ');
            }
            else{
                $product->delete();
                return redirect()->route('product.index')->with('success',"Bạn đã xóa thành công");

            }


    }
}
