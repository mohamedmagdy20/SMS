<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Classes\ClassRequest;
use App\Models\Classes;
use App\Models\Semester;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClassController extends BaseController
{
    //
     //
     protected $model;
     public $bath = 'classes.';
     public $semester;
     
     public function __construct(Classes $model , Semester $semester )
     {
         parent::__construct($model);
         $this->semester = $semester;
     }
 
     public function index()
     {
         return view($this->viewPath($this->bath.'index'));
     }
 
     public function create()
     {
         $semester = $this->semester->all();
         return view($this->viewPath($this->bath.'create'),['semesters'=>$semester]);
     }
 
     public function edit($id)
     {
         $data = $this->findData($id);
         $semester = $this->semester->all();
         return view($this->viewPath($this->bath.'create'),['semester'=>$semester,'data'=>$data]);
     }
 
 
     public function delete($id)
     {
         $data = $this->findData($id);
         $data->delete();
        //  return redirect()->back()->with('success','Deleted');
        return response()->json(['status'=>true]);

     }
 
 
     public function store(ClassRequest $request)
     {
         $data = $request->validated();
         
         $class =  $this->model->create($data);
         return redirect()->back()->with('success','تمت الاضافه');
     }
 
     public function update(ClassRequest $request,$id)
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
