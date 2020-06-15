<?php

namespace App\Http\Controllers;

use App\Categories;
use App\CategoriesList;
use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::with('list')->all();
        return view('admin.equipment', compact('equipments'));
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
            'equipment_code' => 'required',
            'equipment_image' => '',
            'equipment_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'equipment_image_64' => '',
            'equipment_name' => 'required',
            'equipment_location' => '',
            'equipment_role' => 'required',
            'equipment_etc' => '',
            'equipment_status' => 'required',
            'equipment_active' => 'required',
            'list_id' => 'required'
        ]);


        $imageName = time() . '.' . $request->equipment_image->extension();

        $request->equipment_image->move(public_path('images\equipment'), $imageName);

        $equipment_image_64 = 'image_64';

        $equipment = new Equipment([
            'equipment_code' => $request->equipment_code,
            'equipment_image' => $imageName,
            'equipment_image_64' => $equipment_image_64,
            'equipment_name' => $request->equipment_name,
            'equipment_location' => $request->equipment_location,
            'equipment_role' => $request->equipment_role,
            'equipment_etc' => $request->equipment_etc,
            'equipment_status' => $request->equipment_status,
            'equipment_active' => $request->equipment_active,
            'list_id' => $request->list_id
        ]);

        $equipment->save();
        return redirect()->back()->with('success', 'เพิ่ม "' . $equipment->equipment_name . '" สำเร็จ!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $categories)
    {
        $equipments = Equipment::where('list_id', $id)->get();
        $list = CategoriesList::all();
        $list1 = CategoriesList::find($id);
        $categories = Categories::find($categories);
        return view('admin.equipment', compact('categories', 'list1', 'equipments', 'list'));
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
            'equipment_code' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'equipment_name' => 'required',
            'equipment_location' => '',
            'equipment_role' => 'required',
            'equipment_etc' => '',
            'equipment_status' => 'required',
            'equipment_active' => 'required',
            'list_id' => 'required'
        ]);

        if ($request->image == '') {
            $equipment = Equipment::find($id);
            $equipment->equipment_code = $request->equipment_code;
            $equipment->equipment_name = $request->equipment_name;
            $equipment->equipment_location = $request->equipment_location;
            $equipment->equipment_role = $request->equipment_role;
            $equipment->equipment_etc = $request->equipment_etc;
            $equipment->equipment_status = $request->equipment_status;
            $equipment->equipment_active = $request->equipment_active;
            $equipment->list_id = $request->list_id;

            $equipment->save();
            return redirect()->back()->with('success', 'แก้ไข "' . $equipment->equipment_name . '" สำเร็จ!!');
        } else {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $equipment_image_64 = 'image_64';

            $equipment = Equipment::find($id);
            $equipment->equipment_code = $request->equipment_code;
            $equipment->equipment_image = $imageName;
            $equipment->equipment_name = $request->equipment_name;
            $equipment->equipment_location = $request->equipment_location;
            $equipment->equipment_role = $request->equipment_role;
            $equipment->equipment_etc = $request->equipment_etc;
            $equipment->equipment_status = $request->equipment_status;
            $equipment->equipment_active = $request->equipment_active;
            $equipment->list_id = $request->list_id;

            $equipment->save();
            return redirect()->back()->with('success', 'แก้ไข "' . $equipment->equipment_name . '" สำเร็จ!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipment::find($id)->delete();
        return redirect()->back()->with('success', 'ลบ รายการครุภัฑณ์ สำเร็จ!!');
    }
}
