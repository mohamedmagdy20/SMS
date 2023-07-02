<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Semester\SemseterRequest;
use App\Models\Semester;
use Yajra\DataTables\Facades\DataTables;

class SemseterController extends BaseController
{
    //
    protected $model;
    public $bath = 'semesters.';
    
    public function __construct(Semester $model  )
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
        return response()->json(['status'=>true]);

        // return redirect()->back()->with('success','Deleted');
    }


    public function store(SemseterRequest $request)
    {
        $data = $request->validated();
        $user =  $this->model->create($data);
        return redirect()->back()->with('success','تمت الاضافه');
    }

    public function update(SemseterRequest $request,$id)
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
