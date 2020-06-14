<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Rent;
use DateTime;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rent = Rent::orderBy('created_at','desc')->get();
        return view('admin.rent', compact('rent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $rent = Equipment::find($id);
        return view('user.equipment-user', compact('rent'));
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
            'user_id' => 'required',
            'equipment_id' => 'required',
            'rent_detail' => 'required',
        ]);

        $rent = new Rent([
            'user_id' => $request->user_id,
            'equipment_id' => $request->equipment_id,
            'rent_detail' => $request->rent_detail
        ]);
        $equipment = Equipment::find($request->equipment_id);
        $equipment->equipment_status = 2;
        $equipment->save();

        $rent->save();

        return redirect()->back()->with('success', 'ทำการยืม ..' . $rent->equipment->equipment_name . '..สำเร็จ กรุณารอการยืนยันจากเจ้าหน้าที่');
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
            'user_id' => 'required',
            'equipment_id' => 'required',
            'rent_status' => 'required',
            'rent_etc' => '',
            'rent_date' => '',
            'rent_return_date_fix' => '',
            'rent_return_date' => '',
        ]);

        $rent = Rent::find($id);
        $rent->user_id = $request->user_id;
        $rent->equipment_id = $request->equipment_id;
        $rent->rent_status = $request->rent_status;
        $rent->rent_etc = $request->rent_etc;
        $rent->rent_date = $request->rent_date;
        $rent->rent_return_date_fix = $request->rent_return_date_fix;
        $rent->rent_return_date = $request->rent_return_date;

        $rent->save();

        return redirect()->back()->with('success', 'แก้ไข รายการยืม สำเร็จ!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rent::find($id)->delete();

        return redirect()->back()->with('success', 'ลบ รายการยืม สำเร็จ!!');
    }
}
