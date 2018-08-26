<?php
/**
 * Created by PhpStorm.
 * User: leviet
 * Date: 26/08/2018
 * Time: 10:43 SA
 */
namespace Modules\Staff\Repository;
use App\Helper\Helper;
use Modules\Staff\Models\CategoryTable;

class CategoryRepository
{
    private $_category ;

    /**
     * CategoryRepository constructor.
     * @param CategoryTable $categoryTable
     */
    public function __construct(CategoryTable $categoryTable)
    {
        $this->_category  = $categoryTable;
    }

    /**
     * @return mixed
     */
    public function getIdListCategory(){
        return  $this->_category->get(['category_id']);
    }

    /**
     * @return mixed
     */
    public function countCategory(){
        return $this->_category->count() ;
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateCategory(array $data){
        $listCategoryUpdate  = [] ;
        $listCategoryAdd     = [] ;
        if ($data) {
            $listCategory   = Helper::customMenuCategoryAdmin($data);
            if (!empty($listCategory)) {

                foreach ($listCategory as $key => $item ){

                    if (isset($item['category_id'])) {
                        $listCategoryUpdateId[] = $item['category_id'];

                        $listCategoryUpdate[] = $item;
                    } else {
                        $listCategoryAdd[] = $item;
                    }
                }
            }
        }
        isset($listCategoryUpdate['category_id']) ? $this->update($listCategoryUpdate,'category_id', $listCategoryUpdateId): $this->store($listCategoryUpdate) ;
        if($listCategoryAdd){
          $result  =   $this->store($listCategoryAdd);
          if($result){
              return ['status'=>true, 'message'=>"Update message success"];
          }
        }
        return ['status'=>true, 'message'=>"Update message success"];
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attributes
     * @return mixed
     */
    public function update(array  $data, $id, $attributes = 'id'){
//        if (is_array($attributes)) {
//         return   $this->whereIn($id , $attributes)->update($data);
//        }

        return $this->updateOrCreate($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data){
        return $this->_category->insert($data);
    }
}