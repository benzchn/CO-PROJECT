<?php

namespace App\Http\Controllers;

use App\Categories;
use App\CategoriesList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieslist = CategoriesList::all();
        return view('admin.categorieslist', compact('categorieslist'));
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
        // dd($request);
        $request->validate([
            'list_title' => 'required',
            'categories_id' => 'required',
            'list_price_per_unit' => 'required',
            'list_get' => 'required',
            'list_fiscalyear' => 'required',
            'list_status' => 'required'
        ]);

        $categorieslist = new CategoriesList([
            'list_title' => $request->list_title,
            'categories_id' => $request->categories_id,
            'list_price_per_unit' => $request->list_price_per_unit,
            'list_get' => $request->list_get,
            'list_fiscalyear' => $request->list_fiscalyear,
            'list_status' => $request->list_status
        ]);

        $categorieslist->save();
        return redirect()->back()->with('success', 'เพิ่ม "' . $categorieslist->list_title . '" สำเร็จ!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $categorieslist = DB::table('categories_lists')->where('categories_id', $id);
        // $categorieslist1 = CategoriesList::where('categories_id', $id);
        // $categorieslist = CategoriesList::find('categories_id',$id);
        $categories1 = Categories::find($id);
        $categories1 = $categories1->categories_name;
        $categories2 = Categories::find($id);
        $categories2 = $categories2->id;

        $categorieslist = CategoriesList::where('categories_id', $id)->get();

        $categories = Categories::all();
        // dd($categories1);
        // dd($categorieslist);


        return view('admin.categorieslist', compact('categorieslist', 'categories', 'categories1', 'categories2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'list_title' => 'required',
            'categories_id' => 'required',
            'list_price_per_unit' => 'required',
            'list_get' => 'required',
            'list_fiscalyear' => 'required',
            'list_status' => 'required'
        ]);

        $categorieslist = CategoriesList::find($id);
        $categorieslist->list_title = $request->list_title;
        $categorieslist->categories_id = $request->categories_id;
        $categorieslist->list_price_per_unit = $request->list_price_per_unit;
        $categorieslist->list_get = $request->list_get;
        $categorieslist->list_fiscalyear = $request->list_fiscalyear;
        $categorieslist->list_status = $request->list_status;

        $categorieslist->save();
        return redirect()->back()->with('success', 'แก้ไข "' . $categorieslist->list_title . '" สำเร็จ!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriesList::find($id)->delete();
        return redirect()->back()->with('success', 'ลบ รายการครุภัฑณ์ สำเร็จ!!');
    }
}
