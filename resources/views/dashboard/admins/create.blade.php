@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      اضافه اداري
      <small>الادراه</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> الاداره</a></li>
      <li class="active">اضافه اداري</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">اضافه اداري</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.admins.store')}}" enctype="multipart/form-data">
            @csrf
          <!-- text input -->
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter ...">
                  </div>
                  @error('name')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>  
            <div class="col-md-6">
                <div class="form-group">
                    <label>الايميل</label>
                    <input type="email"  name="email" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('email')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="text"  name="phone" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('phone')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>كلمه السر </label>
                    <input type="password"  name="password" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('password')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>كلمه السر </label>
                    <input type="password"  name="password_confirmation" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('password')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>الصوره</label>
                    <input type="file" name="image" class="form-control"  id="">
                  </div>
                  @error('image')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-12">
                  <!-- radio -->
          <div class="form-group">
            @foreach ($role as $r )
            <div class="radio">
                <label>
                  <input type="radio" name="role_id" id="optionsRadios-{{$r->id}}" value="{{$r->id}}" >
                  {{$r->display_name}}
                </label>
              </div>      
            @endforeach
            @error('role_id')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
          
            
          </div>
            </div>
          </div>
         
        



        <input type="submit" value="حفظ" class="btn btn-primary">


        </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
    </div>
</section>
@endsection