<?php
/**
 * Created by PhpStorm.
 * User: huuda
 * Date: 6/13/2018
 * Time: 12:00 AM
 */

namespace Modules\Staff\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class CategoryTable extends Model
{
    protected $guard        = 'admin';
    protected $table        = 'categories';
    protected $fillable     = ['category_id', 'category_icon','category_image', 'category_name','category_title', 'category_parent', 'ordering', 'is_active', 'is_delete', 'created_at', 'created_by', 'updated_at', 'updated_by'];
    protected $primaryKey   = 'category_id';



}