<?php

namespace Modules\Staff\Http\Controllers;


use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Staff\Factory\RepositoryFactory;


class CategoryController extends BaseController
{

    protected $_categoryRepo;

    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->_categoryRepo = RepositoryFactory::categoryRepository();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('staff::category.index', [
            'title' => "Danh sách thể loại"
        ]);
    }

    /**
     * @param Request $request
     */
    public function updateCategory(Request $request)
    {
        $paramCategory  = json_decode($request->category, true);
        $resultUpdate   = $this->_categoryRepo->updateCategory($paramCategory);
        if($resultUpdate['status']){
            Helper::returnJsonNotify(true,200,'Cập nhật menu thành công');
        }
        Helper::returnJsonNotify(false,null, 'Đã xãy ra lỗi');
    }

}

