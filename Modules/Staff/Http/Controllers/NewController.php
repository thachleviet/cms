<?php


namespace Modules\Staff\Http\Controllers;
use Illuminate\Http\Request;

class NewController extends BaseController
{
    protected $_new ;
    public function __construct()
    {
        $this->_new  = new News();
    }

    public function index(Request $request)
    {
        return view('staff::new.index',[
            'title'=>"Danh sách thể loại"
        ]);
    }

    /**
     * @author Le Viet Thach
     * @return mixed
     * @throws \Exception
     */
    public function getListNew(Request $request){
        $param  = $request->input(['keyword']);

        $status = $request->input('status', " ") ;

        return DataTables::of($this->_new->getAll($status) )
            ->filter(function($query) use ($param , $status){

                $query->where(function($q) use($param, $status){

                    if(!empty($param)){
//                        $q->where('staff_email', 'LIKE', '%'.$param.'%');
//                        $q->orWhere('staff_phone', 'LIKE', '%'.$param.'%');
//                        $q->orWhere('staff_full_name', 'LIKE', '%'.$param.'%');
                    }

                });
            })
            ->addColumn('action', function ($oSelect){
                return view('staff::new.column.action', [
                    'new_id'=>$oSelect->staff_id,
                    'is_active'=>$oSelect->is_active,
                ])->render();
            })
            ->editColumn('created_at', function ($oSelect){
                return view('staff::new.column.datetime', [
                    'datetime'=>$oSelect->created_at,
                ])->render();
            })
            ->editColumn('is_active', function($oSelect){
                return view('staff::new.column.status', ['is_active' => $oSelect->is_active])->render();
            })
            ->rawColumns(['is_active', 'action', 'created_at'])
            ->make(true);
    }
}