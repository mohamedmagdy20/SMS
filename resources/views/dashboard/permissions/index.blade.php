@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        تعديل صلاحيات  {{$role->display_name}} 
      <small>عرض تعديل صلاحيات </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> لوحه التحكم</a></li>
      <li class="active">تعديل صلاحيات </li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">الصلاحيات</h3>
                  </div><!-- /.box-header -->
                
                <div class="box-body">
        
                    <h4 class="box-title">تعديل الصلاحيات </h4>
                    
                    <form method="post" action="{{ route('dashboard.permission.update',$role->id) }}"  class="needs-validation"  novalidate >
                        @csrf
        
                    <div class="row mb-3" style="margin-right: 10px;">
                        @foreach ($permissions as $permission)
                        <div class="col-md-2 bg-white">
                            <div class="">
                                <div class="checkbox checkbox-primary mb-2">
                                    <input id="{{ $permission->id }}" type="checkbox"
                                        {{ $role->hasPermission($permission->name) ? 'checked' : '' }}
                                        value="{{ $permission->id }}" name="permissions[]" class="form-check-input" >
                                    <label for="{{ $permission->id }}">{{ $permission->display_name }}</label>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    @endforeach
                    </div>
        
                    
                    <!-- end row -->
        
        <input type="submit" class="btn btn-info waves-effect waves-light validate" value="تعديل">
                    </form>
                     
                   
                   
                </div>
            </div>
        </div> <!-- end col -->
    </div>
         
        
        

  </section>
@endsection

