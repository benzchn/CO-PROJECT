<?php

namespace App\Http\Controllers;

use App\RepairStatus;
use Illuminate\Http\Request;

class RepairStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */s
    public function index()
    {
        $repairstatus = RepairStatus::
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
     * @param  \App\RepairStatus  $repairStatus
     * @return \Illuminate\Http\Response
     */
    public function show(RepairStatus $repairStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RepairStatus  $repairStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RepairStatus $repairStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RepairStatus  $repairStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepairStatus $repairStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RepairStatus  $repairStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepairStatus $repairStatus)
    {
        //
    }
}
