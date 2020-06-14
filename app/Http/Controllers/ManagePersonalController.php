<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagePersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = User::where('role', 'personal')->get();
        return view('admin.manage-personal', compact('personal'));
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
        //
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
            'form' => 'required'
        ]);
        if ($request->form == 'edit') {
            $request->validate([
                'user_id' => 'required',
                'password' => 'required',
                'name' => 'required',
                'phone' => 'required',
            ]);

            $personal = User::find($id);
            $personal->user_id = $request->user_id;
            $personal->email = $request->user_id;
            $personal->name = $request->name;
            $personal->password = Hash::make($request->password);
            $personal->phone = $request->phone;

            $personal->save();

            return redirect()->back()->with('success', 'แก้ไขข้อมูลผู้ใช้ .."' . $personal->name . '".. สำเร็จ!!');
        } elseif ($request->form == 'del') {
            $del = User::find($id);
            $del->user_status = 0;
            $del->save();

            return redirect()->back()->with('success', 'ปิดการใช้งานบัญชีผู้ใช้สำเร็จ!!');
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
        User::find($id)->delete();
        return redirect()->back()->with('success', 'ปิดการใช้งานบัญชีผู้ใช้สำเร็จ!!');
    }
}
