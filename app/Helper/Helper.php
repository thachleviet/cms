<?php
/**
 * Created by PhpStorm.
 * User: leviet
 * Date: 26/08/2018
 * Time: 9:45 SA
 */

namespace App\Helper;


use Illuminate\Support\Facades\Auth;

class Helper
{
    /**
     * @param array $array
     * @return array
     */
    public static function customMenuCategoryAdmin(array $array){
        foreach ($array as $key=>$item){
            $item['category_parent']  = 0;
            if(isset($item['children'])){
                $arrayParam[] = $item;
                foreach ($item['children'] as $k=>$v){
                    $v['category_parent']  = $item['category_parent'];
                    if(isset($v['children'])){
                        $arrayParam[]  = $v;
                        foreach ($v['children'] as  $ks=>$i){
                            $i['category_parent']  = $v['category_parent'];
                            if(isset($i['children'])){
                                $arrayParam[] = $i;
                                foreach ($i['children'] as $c=>$x){
                                    $x['category_parent']  = $i['category_parent'];
                                    if(isset($x['children'])){
                                        $arrayParam[]  = $x;
                                    }else{
                                        $arrayParam[]  = $x;
                                    }
                                }
                            }else{
                                $arrayParam[]  = $i;
                            }
                        }
                    }else{
                        $arrayParam[]  = $v;
                    }
                }
            }else{
                $arrayParam[] = $item ;
            }
        }
        $arrayPara = [] ;
        foreach ($arrayParam as $key1=>$vvv){
            $vvv['category_icon']  =  $vvv['icon'];
            $vvv['created_at']     = date('Y-m-d H:i:s') ;
            $vvv['created_by']     = Auth::user()->staff_id ;
            $vvv['updated_at']     = date('Y-m-d H:i:s') ;
            $vvv['updated_by']     = Auth::user()->staff_id ;
            unset($vvv['icon']);
            if(isset($vvv['children'])){
                unset($vvv['children']) ;
                $arrayPara[] = $vvv ;
            }else{
                $arrayPara[] =$vvv ;
            }
        }

        return  $arrayPara;
    }

    /**
     * @param $boolean
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function returnJsonNotify($boolean , $code = 200, $message = ''){
        if($boolean){
            return response()->json(['status'=>$boolean,'result'=>['code'=>$code,'message'=>$message]]) ;
        }else{
            return response()->json(['status'=>$boolean,'result'=>['message'=>$message]]) ;
        }
    }
}