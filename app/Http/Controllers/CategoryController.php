<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::latest()->paginate(5);



        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'prioty'=>'required',

        ],
        [
            'name.required'=>'chua nhap ten',
            'prioty.required'=>'thu tu uu tien ko de trong'
        ]
        );
        Category::create($request->all());

        return redirect()->route('category.index')
                        ->with('success','category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required|unique:category',
            'prioty'=>'required',

        ],
        [
            'name.required'=>'chua nhap ten',
            'prioty.required'=>'thu tu uu tien ko de trong',
        ]
        );
        // $category->update($request->only('name','prioty','status'));
        // return redirect()->route('category.index')->with('success',"C???p nh???t th??nh c??ng");
        $category->update($request->all());

        return redirect()->route('category.index')
                        ->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->products->count()>0){
            return redirect()->route('category.index')->with('error',"Kh??ng th??? x??a danh m???c");
        }
        else {
            $category->delete();
            return redirect()->route('category.index')->with('success',"B???n ???? x??a th??nh c??ng");

        }
    }
}

