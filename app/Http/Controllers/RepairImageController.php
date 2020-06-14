<?php

namespace App\Http\Controllers;

use App\RepairImage;
use Illuminate\Http\Request;

class RepairImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $request->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:doc,pdf,docx,zip'
        ]);


        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $imageName = time() . '.' . $file->extension();
                $file->move(public_path('images/repair'), $imageName);
                $data[] = $imageName;
            }
        }


        $repairimage = new RepairImage([
            'repair_id' => $request->repair_id,
            'filenames' => json_encode($data)
        ]);
        $repairimage->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RepairImage  $repairImage
     * @return \Illuminate\Http\Response
     */
    public function show(RepairImage $repairImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RepairImage  $repairImage
     * @return \Illuminate\Http\Response
     */
    public function edit(RepairImage $repairImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RepairImage  $repairImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepairImage $repairImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RepairImage  $repairImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepairImage $repairImage)
    {
        //
    }
}
