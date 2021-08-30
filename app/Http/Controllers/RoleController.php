<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $perPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = [];
        if($request->has('keyword')) {
            $roles = Role::where('name','LIKE',"%{$request->keyword}%")->paginate($this->perPage);
        }else{
            $roles = Role::paginate($this->perPage);
        }
        return view('admin.roles.index',[
            'roles' => $roles->appends(['keyword' => $request->keyword]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create',[
            'authorities'       => config('permission.authorities')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'          => ['required','string','max:50','unique:roles,name'],
                'permissions'   => ['required']
            ]);

        if($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try{
            $role = Role::create(['name'  => $request->name]);
            $role->givePermissionTo($request->permissions);
            Alert::success("Tambah Role","Berhasil");
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::roolBack();
            Alert::error("Tambah Role", "Gagal");
            return redirect()->back()->withInput($request->all());
        }
        finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.detail',[
            'role'          => $role,
            'authorities'   => config('permission.authorities'),
            'rolePermissions'   => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit',[
            'role'              => $role,
            'authorities'       => config('permission.authorities'),
            'permissionChecked' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'          => ['required','string','max:50','unique:roles,name,' . $role->id],
                'permissions'   => ['required']
            ]);

        if($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::beginTransaction();
        try{
            $role->name = $request->name;
            $role->syncPermissions($request->permissions);
            $role->save();
            Alert::success("Ubah Data","Berhasil");
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::roolBack();
            Alert::error("Ubah Data","Gagal" . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
        finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // if(User::role($role->name)->count()){
        //     Alert::warning(
        //         trans('roles.alert.delete.title'),
        //         trans('roles.alert.delete.message.warning', ['name' => $role->name])
        //     );
        //     return redirect()->back();
        // }
        DB::beginTransaction();
        try{
            $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
            $role->delete();
            Alert::success("Hapus Role", "Berhasil");
        } catch (\Throwable $th) {
            DB::roolBack();
            Alert::error("Hapus Role", "Gagal" . $th->getMessage());
        }
        finally {
            DB::commit();
        }
        return redirect()->route('roles.index');
    }
}
