@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      اضافه الغرف الدراسيه
      <small>الفصول</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard.classes.store')}}"><i class="fa fa-dashboard"></i> المواد الدراسيه</a></li>
      <li class="active">اضافه الغرف الدراسيه</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">اضافه الغرف الدراسيه</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.classes.store')}}" enctype="multipart/form-data">
            @csrf
          <!-- text input -->
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter ...">
                  </div>
                  @error('name')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>  
            <div class="col-md-12">
                <div class="form-group">
                    <label>ملاحظات</label>
                    <textarea name="note" id="" class="form-control" cols="30" rows="10"></textarea>
                  </div>
                  @error('note')
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