@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      اضافه ماده دراسيه
      <small>المواد الدراسيه</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard.subjects.index')}}"><i class="fa fa-dashboard"></i> المواد الدراسيه</a></li>
      <li class="active">اضافه ماده دراسيه</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">اضافه ماده دراسيه</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.subjects.store')}}" enctype="multipart/form-data">
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
                    <label>عدد الحصص</label>
                    <input type="number"  name="num_of_classes" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('num_of_classes')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>اسم الكتاب</label>
                    <input type="text"  name="book_name" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('book_name')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>رابط الكتاب</label>
                    <input type="url"  name="book_url" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('book_url')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
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