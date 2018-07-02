<?php

namespace Modules\Staff\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Staff\Entities\StaffTable;

class StaffController extends BaseController
{

    protected $_staff ;

    public function __construct(StaffTable $staffTable)
    {
        $this->_staff  =  $staffTable;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('staff::staff.index',[
            'object'=>$this->_staff->getAll(),
            'title'=>"Danh sách nhân viên"
        ]);
    }


    /**
     * @return string
     * @throws \Throwable
     */
    public function create()
    {

        return view('staff::staff.popup.create',[
            '_title'=>'Thêm nhân viên'
        ])->render();
    }


    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('staff::staff.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('staff::staff.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
