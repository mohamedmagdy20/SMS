@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      اضافه معلم
      <small>المعلم</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> الاداره</a></li>
      <li class="active">اضافه معلم</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">اضافه معلم</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.teachers.store')}}" enctype="multipart/form-data">
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

            <div class="col-md-12">
                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text"  name="address" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('address')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>المكافات الشهريه</label>
                    <input type="number"  name="tips" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('tips')
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
                    <input type="file" name="image" class="form-control"   id="choose-file">
                  </div>
                  @error('image')
                  <span style="color:red;">{{$message}}</span>
                  @enderror

                  <div id="img-preview"></div>
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