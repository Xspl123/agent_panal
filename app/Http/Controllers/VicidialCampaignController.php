<?php

namespace App\Http\Controllers;

use App\Models\vicidial_campaign;
use App\Services\allService;
use Illuminate\Http\Request;


class VicidialCampaignController extends Controller
{
    protected $SelectService;

    public function __construct(allService $SelectService)
    {
        $this->SelectService = $SelectService;
    }

    public function index()
    {


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
     * @param  \App\Models\vicidial_campaign  $vicidial_campaign
     * @return \Illuminate\Http\Response
     */
    public function show(vicidial_campaign $vicidial_campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vicidial_campaign  $vicidial_campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(vicidial_campaign $vicidial_campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vicidial_campaign  $vicidial_campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vicidial_campaign $vicidial_campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vicidial_campaign  $vicidial_campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(vicidial_campaign $vicidial_campaign)
    {
        //
    }
}
