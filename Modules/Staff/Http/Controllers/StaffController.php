<?php

namespace Modules\Staff\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Modules\Staff\Entities\StaffTable;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends BaseController
{

    protected $_staff ;

    public function __construct(StaffTable $staffTable)
    {
        $this->_staff  =  $staffTable;
    }


    public function index(Request $request)
    {

        return view('staff::staff.index',[
            'title'=>"Danh sách nhân viên"
        ]);
    }


    /**
     * @author Le Viet Thach
     * @return mixed
     * @throws \Exception
     */
    public function getListStaff(Request $request){
        $param  = $request->input(['keyword']);

        $status = $request->input('status', " ") ;

        return DataTables::of($this->_staff->getAll($status) )
            ->filter(function($query) use ($param , $status){

                $query->where(function($q) use($param, $status){

                    if(!empty($param)){
                        $q->where('staff_email', 'LIKE', '%'.$param.'%');
                        $q->orWhere('staff_phone', 'LIKE', '%'.$param.'%');
                        $q->orWhere('staff_full_name', 'LIKE', '%'.$param.'%');
                    }

                });


            })
            ->addColumn('action', function ($oSelect){
                return view('staff::staff.column.action', [
                    'staff_id'=>$oSelect->staff_id,
                    'is_active'=>$oSelect->is_active,
                ])->render();
            })
            ->editColumn('created_at', function ($oSelect){
                return view('staff::staff.column.datetime', [
                    'datetime'=>$oSelect->created_at,
                ])->render();
            })
            ->editColumn('is_active', function($oSelect){
                return view('staff::staff.column.status', ['is_active' => $oSelect->is_active])->render();
            })
            ->rawColumns(['is_active', 'action', 'created_at'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatus(Request $request){
        try{
            if($this->_staff->changStatus($request->all(['is_active']) , $request->input('id'))){
                return response()->json(['status'=>true, 'messages'=>'Cập  dữ liệu thành công !']) ;
            }
        }catch (\Exception $exception){
              return response()->json(['status'=>false, 'messages'=>'Đã xảy ra lỗi !']) ;
        }

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
        DB::beginTransaction();
        try{
            if($request->isMethod('post')){
                $validator  = Validator::make($request->all() , [
                    'staff_first_name'  => 'required',
                    'staff_last_name'   => 'required',
                    'staff_email'       => 'required|email|unique:staffs',
                    'staff_phone'       => 'required|unique:staffs',
                ],[
                    'staff_first_name.required' =>  'Vui lòng nhập first name',
                    'staff_last_name.required'  =>  'Vui lòng nhập last name',
                    'staff_email.required'      =>  'Vui lòng nhập email',
                    'staff_email.email'         =>  'Vui lòng nhập đúng email',
                    'staff_email.unique'        =>  'Email đã tồn tại',
                    'staff_phone.required'      =>  'Vui lòng nhập số điện thoại',
                    'staff_phone.unique'        =>  'Số điện thoại đã tồn tại',
                ]) ;

                if($validator->fails()){
                    return response()->json(['errors'=>$validator->errors()]) ;
                }
                $this->_staff->add($this->arrayObject($request, 'add'));

                DB::commit() ;
                return response()->json(['status'=>true, 'messages'=>'Thêm dữ liệu thành công !']) ;
            }
        }catch (\Exception $exception){
          DB::rollBack();
          return   $exception->getMessage() ;
        }
    }


    function arrayObject($request , $action)
    {
        if ($action == 'add') {
            $array = [
                'staff_first_name'  => $request->input('staff_first_name'),
                'staff_last_name'   => $request->input('staff_last_name'),
                'staff_full_name'   => ($request->input('staff_first_name'). ' ' . $request->input('staff_last_name')),
                'staff_email'       => $request->input('staff_email'),
                'staff_phone'       => $request->input('staff_phone'),
                'created_at'        => date('Y-m-d H:i:s'),
                'staff_gender'      => $request->input('staff_gender'),
                'staff_birthday'    => date('Y-m-d H:i:s', strtotime($request->input('staff_birthday'))),
                'is_active'         => $request->input('is_active'),
                'group_id'          => $request->input('group_id'),
                'staff_description' => $request->input('staff_description'),
            ];
            if ($request->hasFile('staff_avatar')) {
                $array['staff_avatar'] = 'uploads/' . $this->uploadFiles($request, 'staff_avatar', 'staff_avatar', 'uploads', time());
                return array_merge($array, $array);
            }

            return $array;
        } else {
            $array = [
                'staff_first_name'  => $request->input('staff_first_name'),
                'staff_last_name'   => $request->input('staff_last_name'),
                'staff_full_name'   => ($request->input('staff_first_name'). ' ' . $request->input('staff_last_name')),
                'staff_email'       => $request->input('staff_email'),
                'staff_phone'       => $request->input('staff_phone'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'staff_gender'      => $request->input('staff_gender'),
                'staff_birthday'    => date('Y-m-d H:i:s', strtotime($request->input('staff_birthday'))),
                'is_active'         => $request->input('is_active'),
                'group_id'          => $request->input('group_id'),
                'staff_description' => $request->input('staff_description'),
            ];
            if ($request->hasFile('staff_avatar')){
                $array['staff_avatar'] = 'uploads/' . $this->uploadFiles($request, 'staff_avatar', 'staff_avatar', 'uploads', time());
                return array_merge($array, $array);
            }
            return $array;
        }
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
     * @param Request $request
     * @param $id
     * @return string
     * @throws \Throwable
     */
    public function edit($id)
    {
        // model staff
        $mStaff  =  new StaffTable() ;
        // get item staff
        $object  = $mStaff->getItem($id) ;
        return view('staff::staff.popup.edit',[
            '_title'=>'Cập nhật nhân viên ',
            '_object'=>$object
        ])->render();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try{
            if($request->isMethod('post')){
                $validator  = Validator::make($request->all() , [
                    'staff_first_name'  => 'required',
                    'staff_last_name'   => 'required',
                    'staff_email'       => 'required|email|unique:staffs,staff_email,'.$request->input('staff_id').',staff_id',
                    'staff_phone'       => 'required|unique:staffs,staff_phone,'.$request->input('staff_id').',staff_id',
                ],[
                    'staff_first_name.required' =>  'Vui lòng nhập first name',
                    'staff_last_name.required'  =>  'Vui lòng nhập last name',
                    'staff_email.required'      =>  'Vui lòng nhập email',
                    'staff_email.email'         =>  'Vui lòng nhập đúng email',
                    'staff_email.unique'        => 'Email đã tồn tại',
                    'staff_phone.required'      =>  'Vui lòng nhập số điện thoại',
                    'staff_phone.unique'        =>  'Số điện thoại đã tồn tại',
                ]) ;

                if($validator->fails()){
                    return response()->json(['errors'=>$validator->errors()]) ;
                }

                if($request->hasFile('staff_avatar')){

                    $object = $this->_staff->getItem($request->input('staff_id')) ;
                    $this->validate($request, [
                        'staff_avatar'               => 'mimes:jpeg,jpg,png',
                    ],[
                        'staff_avatar.mimes'         =>'Hình ảnh phải đúng đinh dạng jpeg,jpg,png',
                    ]);
                    if(!empty($object['staff_avatar'])){
                        if(is_file(base_path().'/'.$object['staff_avatar'].'')){
                            unlink(base_path().'/'.$object['staff_avatar'].'');
                        }
                    }
                }

                $this->_staff->edit($this->arrayObject($request, 'update'), $request->input('staff_id'));

                DB::commit() ;
                return response()->json(['status'=>true, 'messages'=>'Cập  dữ liệu thành công !']) ;
            }
        }catch (\Exception $exception){
            DB::rollBack();
            return   $exception->getMessage() ;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try{
            if($this->_staff->deletes($id)){
                return response()->json(['status'=>true, 'messages'=>'Xóa dữ liệu thành công !']) ;
            };
        }catch (\Exception $exception){

            return response()->json(['status'=>false, 'messages'=>'Đã xảy ra lỗi !']) ;

        }

    }


    // function upload files
    public function uploadFiles($request , $fileName ,$prefix = null, $uploads = 'uploads', $time , $option = null){
        $names = '';
        if($option == 'image_child'){
            $names 	= $time.'_'.date('d_m_Y').'_'.$prefix.'.'.$fileName->getClientOriginalExtension();
            $destinationPath = base_path($uploads);
            $fileName->move($destinationPath, $names);
            return $names ;
        }
        if($request->hasFile($fileName)){
            $image  = $request->file($fileName);
            $names 	= time().'_'.date('d_m_Y').'_'.$prefix.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path($uploads.'/'.$names);
            Facades\Image::make($image->getRealPath())->fit(300, 300)->save($destinationPath);
        }
        return $names ;
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function showChangeAction(Request $request){

        return view('staff::staff.popup.show-change-action',[
            '_title'=>"Danh sách nhân viên"
        ])->render();
    }

    public function getListStatus(Request $request){
        if($request->isMethod('post')){
            $this->_staff->getAll();
        }
    }
}
