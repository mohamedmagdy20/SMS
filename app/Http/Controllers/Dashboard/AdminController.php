<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends BaseController
{
    //
    public $bath = 'admins.';
    public $role;
    protected $model;
    
    public function __construct(User $model , Role $role )
    {
        parent::__construct($model);
        $this->role = $role;
    }

    public function index()
    {
        
        return view($this->viewPath($this->bath.'index'));
    }

    public function create()
    {
        $role = $this->role->whereIn('name',['super_admin','admin'])->get();
        return view($this->viewPath($this->bath.'create'),['role'=>$role]);
    }

    public function edit($id)
    {
        $data = $this->findData($id);
        $role = $this->role->all();
        return view($this->viewPath($this->bath.'create'),['role'=>$role,'data'=>$data]);
    }


    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
        // return redirect()->back()->with('success','Deleted');
        return response()->json(['status'=>true]);
    }


    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image'))
        {
            $data['image'] = $this->storeImage($data['image'],config('path.ADMIN_PATH'));
        }
        $user =  $this->model->create($data);
        $user->attachRole($data['role_id']);
        return redirect()->back()->with('success','تمت الاضافه');
    }

    public function update(AdminRequest $request,$id)
    {
        $data = $request->validated();
        $user = $this->findData($id);
        if ($request->hasFile('image'))
        {
            $data['image'] = $this->updateImage($data['image'],$user->image,config('path.ADMIN_PATH'));
        }
        $user =  $user->update($data);
        $user->attachRole($data['role_id']);
        return redirect()->back()->with('success','تمت التعديل');        
    }
    

    public function data()
    {
        $data = $this->model->admin()->latest();
        return DataTables::of($data)->addColumn('role',function($data){
            return $data->roles[0]->display_name;
        })->editColumn('image',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'image']);
        })
        ->addColumn('actions',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'actions']);
        })->make(true);  
    }
}
