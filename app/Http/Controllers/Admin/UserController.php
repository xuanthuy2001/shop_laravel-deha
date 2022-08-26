<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\CreateRoleRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user,Role $role)
    {
        $this -> user = $user;
        $this -> role = $role;
    }
    
    public function index()
    {
        $users =$this->user->latest('id')->paginate(3);
      
        // compact truyền dữ liệu sang view
        return view('admin.users.index', compact('users'));
    }

 
    public function create()
    {
        $roles = $this -> role->all() -> groupBy('group');
        return view('admin.users.create', compact('roles'));
    }

   
    public function store(CreateUserRequest $request)
    {
        $dataCreate = $request -> all();
        $dataCreate['password'] =  Hash::make($request->password);
        $dataCreate['image'] = $this ->user -> saveImage($request);

        $user =  $this->user->create($dataCreate);
        $user->images()->create(['url' => $dataCreate['image']]);
        $user -> roles() ->attach($dataCreate['role_ids']);
        return redirect()->route('users.index')->with(['message' => 'Create success']);
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user =  $this->user->findOrFail($id)->load('roles');
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    
    public function update(UpdateUserRequest $request, $id)
    {
        $dataUpdate = $request->except('password');
        $user =  $this->user->findOrFail($id)->load('roles');

        if($request->password)
        {
            $dataCreate['password'] = Hash::make($request->password);
        }
        $currentImage =  $user->images ? $user->images->first()->url : '';
        $dataUpdate['image'] = $this->user->updateImage($request, $currentImage);

        $user->update($dataUpdate);
        $user->images()->delete();
        $user->images()->create(['url' => $dataUpdate['image']]);
        $user->roles()->sync($dataUpdate['role_ids'] ?? []);
        // return redirect('users.index')  -> with(['message' =>'Update success']);
        return redirect()->route('users.index')->with(['message' => 'Update success']);
    }

   
    public function destroy($id)
    {
        $user =  $this->user->findOrFail($id)->load('roles');
        $user->images()->delete();
        $imageName =  $user->images->count() > 0 ? $user->images->first()->url : '';
        $this->user->deleteImage($imageName);
        $user->delete();

        return redirect()->route('users.index')->with(['message' => 'Delete success']);
    }
}
