<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Distribution\DistributionRequest;
use App\Models\Classes;
use App\Models\Days;
use App\Models\Distribution;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DistributionController extends Controller
{
    //
    protected $model;
    public $bath = 'distributions.';
    public $semester;
    
    public function __construct(Distribution $model )
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view($this->viewPath($this->bath.'index'));
    }

    public function create()
    {
        $semester = Semester::all();
        $classes = Classes::all();
        $days = Days::all();
        $user = User::all();
        
        return view($this->viewPath($this->bath.'create'),['semesters'=>$semester,'classes'=>$classes,'days'=>$days,'users'=>$user]);
    }

    public function edit($id)
    {
        $semester = Semester::all();
        $classes = Classes::all();
        $days = Days::all();
        $user = User::all();
        
        $data = $this->findData($id);
        return view($this->viewPath($this->bath.'create'),['semesters'=>$semester,'classes'=>$classes,'days'=>$days,'users'=>$user,'data'=>$data]);
    }


    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
       //  return redirect()->back()->with('success','Deleted');
       return response()->json(['status'=>true]);

    }


    public function store(DistributionRequest $request)
    {
        $data = $request->validated();
        
        $class =  $this->model->create($data);
        return redirect()->back()->with('success','تمت الاضافه');
    }

    public function update(DistributionRequest $request,$id)
    {
        $data = $request->validated();
        $user = $this->findData($id);
        $user =  $user->update($data);
        return redirect()->back()->with('success','تمت التعديل');        
    }
    

    public function data()
    {
        $data = $this->model->with('semester')->with('classes')->with('days')->with('subject')->latest();
        return DataTables::of($data)
       
        ->addColumn('actions',function($data)
        {
            return view($this->viewPath($this->bath.'action'),['data'=>$data,'type'=>'actions']);
        })->make(true);
    }


}
