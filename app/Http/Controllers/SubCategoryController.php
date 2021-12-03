<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $subCategory;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sub-category.manage', ['sub_categries' => SubCategory::all(), 'categories' => Category::Where('status', 1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCategory::newSubCategory($request);
        return redirect()->back()->with('message', 'Sub Category Create Successfully');
    }

    public function updateStatus($id)   // category status
    {
        return redirect()->back()->with('message', SubCategory::updateSubCategoryStatus($id));
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
        return view('sub-category.edit', ['sub_categry' => SubCategory::find($id),'sub_categries' => SubCategory::all(), 'categories' => Category::Where('status', 1)->get()]);
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
        SubCategory::updateSubCategory($request, $id);
        return redirect('sub-category')->with('message', 'Sub Category info Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subCategory = SubCategory::find($id);
        if (file_exists($this->subCategory->image)) {
            if ($this->subCategory != 'dummy.png') {
                unlink($this->subCategory->image);
            }
        }
        $this->subCategory->delete();
        return redirect('sub-category')->with('message', 'Sub Category info Delete Successfully');
    }
}
