<?php

namespace Modules\Staff\Http\Controllers;


use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct()
    {
    }
    public function index(Request $request)
    {
        return view('staff::category.index',[
            'title'=>"Danh sách thể loại"
        ]);
    }

}