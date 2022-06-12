<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::latest('id')->paginate(3);
        // compact truyền dữ liệu sang view
        return view('admin.roles.index', compact('roles'));
    }


    public function create()
    {
        // groupBy dùng để nhóm kết quả của truy vấn
        $permissions = Permission::all()->groupBy('group');
        return view('admin.roles.create', compact('permissions'));
    }


    public function store(CreateRoleRequest $request)
    {
        // dd($request->all());
        $dataCreate = $request->all();
        $dataCreate['guard_name'] = 'web';

        $role = Role::create($dataCreate);
        // dd($role);
        // Chắc các bạn ai cũng đều rất ngại khi làm việc với quan hệ n-n, nhưng giờ Eloquent đã cung cấp một số phương thức rất hữu ích để làm việc với các model quan hệ. Vẫn ví dụ 1 course có thể có nhiều subjects và 1 subject cũng có thể nằm trong nhiều courses. Để thêm 1 subject cho 1 course bằng cách chèn thêm 1 bản ghi vào trong bảng trung gian thì ta sử dụng phương thức attach
        $role->permissions()->attach($dataCreate['permission_ids']);


        return redirect('roles')->with('message', 'thêm thành công');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all()->groupBy('group');
        // dd($permissions );
        // dd($role->group);
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);
        // dd($role);
        $role->permissions()->sync($dataUpdate['permission_ids']);
        //Bạn có thể cũng sử dụng phương thức sync để khởi tạo quan hệ n-n. Phương thức sync chấp nhận 1 mảng ID để đưa vào bảng trung gian. Bất kì ID nào không ở trong mảng này sẽ bị xóa khỏi bảng trung gian. Vì vậy sau khi tính toán hoàn thành, chỉ có những ID trong mảng sẽ tồn tại trong bảng trung gian:


        return redirect('roles')->with('message', 'sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}