
<a href='javascript:void(0)' onclick="Staff.updateStaff(this, '{{$staff_id}}')" class="btn btn-xs btn-primary" ><i class="fa fa-edit"></i></a>
<a href='javascript:void(0)' class="btn btn-xs btn-warning" onclick="Staff.changeStatus(this, '{{$staff_id}}', '{{$is_active}}')"><i class="fa {{($is_active == 1) ? 'fa-unlock': 'fa-lock'}}"></i> </a>
<a href='javascript:void(0)' onclick="Staff.remove(this, '{{$staff_id}}')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
