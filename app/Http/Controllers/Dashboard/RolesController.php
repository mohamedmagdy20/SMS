<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\RolesRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends BaseController
{
    //
    protected $model;
    public $bath = 'roles.';
    
    public function __construct(Role $model  )
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view($this->viewPath($this->bath.'index'));
    }

    public function create()
    {
        return view($this->viewPath($this->bath.'create'));
    }

    public function edit($id)
    {
        $data = $this->findData($id);
        return view($this->viewPath($this->bath.'create'),['data'=>$data]);
    }


    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
        return redirect()->back()->with('success','Deleted');
    }


    public function store(RolesRequest $request)
    {
        $data = $request->validated();
        $user =  $this->model->create(array_merge($data,['name'=>time()]));
        return redirect()->back()->with('success','تمت الاضافه');
    }

    public function update(RolesRequest $request,$id)
    {
        $data = $request->validated();
        $user = $this->findData($id);
        $user =  $user->update($data);
        return redirect()->back()->with('success','تمت التعديل');        
    }
    

    public function data()
    {
        $data = $this->getQuery();
        return DataTables::of($data)
        ->addColumn('actions',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'actions']);
        })->make(true);
    }

}
