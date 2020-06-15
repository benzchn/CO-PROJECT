<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories', compact('categories'));
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
        $request->validate([
            'categories_code' => 'required',
            'categories_name' => 'required',
            'categories_status' => 'required'
        ]);

        $categories = new Categories([
            'categories_code' => $request->categories_code,
            'categories_name' => $request->categories_name,
            'categories_status' => $request->categories_status
        ]);

        $categories->save();

        return redirect('/categories')->with('success', 'เพิ่ม "' . $categories->categories_name . '" สำเร็จ!!');
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
        $categories = Categories::find($id);
        return view('/categories', compact('categories'));
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
        $request->validate([
            'categories_code' => 'required',
            'categories_name' => 'required',
            'categories_status' => ''
        ]);

        $categories = Categories::find($id);
        $categories->categories_code = $request->categories_code;
        $categories->categories_name = $request->categories_name;
        $categories->categories_status = $request->categories_status;

        $categories->save();

        return redirect('/categories')->with('success', 'แก้ไข "' . $categories->categories_name . '" สำเร็จ!!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id)->delete();

        return redirect('/categories')->with('success', 'ลบ ประเภทครุภัฑณ์ สำเร็จ');
    }
}
