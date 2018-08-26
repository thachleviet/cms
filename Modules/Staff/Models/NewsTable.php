<?php
/**
 * Created by PhpStorm.
 * User: leviet
 * Date: 18/07/2018
 * Time: 2:02 SA
 */

namespace Modules\Staff\Models;


class NewsTable extends  BaseModel
{
    protected $table        = 'news';
    protected $fillable     = [];
    protected $primaryKey   = 'new_id';
}