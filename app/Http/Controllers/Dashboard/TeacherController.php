<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherRequest;
use App\Models\TeacherData;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    //
    protected $model;
    protected $data;
    public $bath = 'dashboard.teachers.';
   
    public function __construct(User $model, TeacherData $data )
    {
        parent::__construct($model);
        $this->data = $data;
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


    public function store(TeacherRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image'))
        {
            $data['image'] = $this->storeImage($data['image'],config('path.TEACHER_PATH'));
        }
        
        $user =  $this->model->create($data);
        $this->data->create(array_merge($data,['user_id'=>$user->id]));
        
        

        return redirect()->back()->with('success','تمت الاضافه');
    }

    public function update(TeacherRequest $request,$id)
    {
        $data = $request->validated();
        $user = $this->findData($id);
        $userData = $this->data->where('user_id',$id)->first();
        if ($request->hasFile('image'))
        {
            $data['image'] = $this->updateImage($data['image'],$user->image,config('path.TEACHER_PATH'));
        }
        $user =  $user->update($data);
        $userData->update($data);
        return redirect()->back()->with('success','تمت التعديل');        
    }
    

    public function data()
    {
        $data = $this->getQuery();
        return DataTables::of($data)
        ->editColumn('image',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'image']);
        })
        ->addColumn('actions',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'actions']);
        })->make(true);
    }

}
