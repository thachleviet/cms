<?php
/**
 * Created by PhpStorm.
 * User: huuda
 * Date: 6/13/2018
 * Time: 12:00 AM
 */

namespace Modules\Staff\Entities;


class StaffTable extends BaseModel
{
    protected $table        = 'staffs';
    protected $fillable     = [];
    protected $primaryKey   = 'staff_id';
}