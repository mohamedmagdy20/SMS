<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Students\StudentRequest;
use App\Models\Classes;
use App\Models\Semester;
use App\Models\StudentData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends BaseController
{
    protected $model;
    protected $data;
    public $bath = 'students.';
    
    public function __construct(User $model, StudentData $data  )
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
        $semeters = Semester::all();
        $classes  = Classes::all(); 
        return view($this->viewPath($this->bath.'create'),['semeters'=>$semeters,'classes'=>$classes]);
    }

    public function edit($id)
    {
        $data = $this->findData($id);
        $semeters = Semester::all();
        $classes  = Classes::all(); 
        return view($this->viewPath($this->bath.'edit'),['semeters'=>$semeters,'classes'=>$classes,'data'=>$data]);
    }


    public function delete($id)
    {
        $data = $this->findData($id);
        if($data->image != null)
        {
            $this->updateImage(null,$data->image,config('path.STUDENT_PATH'));
        }
        if($data->studentData->uid_image != null)
        {
            $this->updateImage(null,$data->studentData->uid_image,config('path.UI_IMAGE'));
        }

        if($data->studentData->certification_image != null)
        {
            $this->updateImage(null,$data->studentData->certification_image,config('path.CERTIFCATION_PATH'));
        }
        $data->delete();
        return response()->json(['status'=>true]);
        // return redirect()->back()->with('success','Deleted');
    }


    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        // upload Student Image //
        if($request->file('image'))
        {
            $data['image'] =  $this->storeImage($request->file('image'),config('path.STUDENT_PATH'));
        }

        if($request->file('uid_image'))
        {
            $data['uid_image'] = $this->storeImage($request->file('uid_image'), config('path.UI_IMAGE'));
        }

        if($request->file('certification_image'))
        {
            $data['certification_image'] = $this->storeImage($request->file('certification_image'), config('path.CERTIFCATION_PATH'));
        }
        $user =  $this->model->create($data);
        $this->data->create(array_merge($data,['user_id'=>$user->id,'password'=>Hash::make($data['password'])]));
        $user->attachRole('student');

        return redirect()->back()->with('success','تمت الاضافه');
    }

    public function update(StudentRequest $request,$id)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        // $data = $request->validated();
        $user = $this->findData($id);
        $user_data = $this->data->where('user_id',$id)->first();
        // upload Student Image //
        if($request->file('image'))
        {
            $data['image'] =  $this->updateImage($user->image,$request->file('image'),config('path.STUDENT_PATH'));
        }

        if($request->file('uid_image'))
        {
            $data['uid_image'] = $this->updateImage($user_data->uid_image,$request->file('uid_image'), config('path.UI_IMAGE'));
        }

        if($request->file('certification_image'))
        {
            $data['certification_image'] = $this->updateImage($user_data->certification_image,$request->file('certification_image'), config('path.CERTIFCATION_PATH'));
        }
        $user->update($data);
        $user_data->update($data);

        return redirect()->back()->with('success','تمت التعديل');        
    }
    

    public function data()
    {
        $data = $this->model->student()->with('studentData',function($q){
            $q->with('semseter')->with('class');
        })->latest();
        return DataTables::of($data)
        ->addColumn('actions',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'actions']);
        })
        ->addColumn('semester',function($data){
            return $data->studentData->semseter['name'];
        })
        ->addColumn('class',function($data){
            return $data->studentData->class['name'];
        })
        ->editColumn('image',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'image']);
        })
        ->addColumn('uid_image',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'uid_image']);
        })
        ->addColumn('certification_image',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'certification_image']);
        })
        ->make(true);
    }

}
