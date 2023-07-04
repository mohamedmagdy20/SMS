@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      تعديل الغرف الدراسيه
      <small>الفصول</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard.classes.store')}}"><i class="fa fa-dashboard"></i> المواد الدراسيه</a></li>
      <li class="active">تعديل الغرف الدراسيه</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">تعديل الغرف الدراسيه</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.classes.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
          <!-- text input -->
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$data->name)}}" placeholder="Enter ...">
                  </div>
                  @error('name')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
                  <label>الاختصار</label>
                  <input type="text" name="sign" class="form-control" value="{{old('sign',$data->sign)}}" placeholder="EX: 2-1 or 3-2">
                </div>
                @error('sign')
                <span style="color:red;">{{$message}}</span>
                    
                @enderror
          </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>ملاحظات</label>
                    <textarea name="note" id="" class="form-control" cols="30" rows="10">{{old('note',$data->note)}}</textarea>
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