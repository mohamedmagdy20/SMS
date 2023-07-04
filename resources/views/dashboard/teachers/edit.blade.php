@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      تعديل معلم
      <small>المعلم</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> المعلم</a></li>
      <li class="active">تعديل معلم</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">تعديل معلم</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.teachers.update',$data->id)}}" enctype="multipart/form-data">
            @csrf
          <!-- text input -->
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$data->name)}}" placeholder="Enter ...">
                  </div>
                  @error('name')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>  
            <div class="col-md-6">
                <div class="form-group">
                    <label>الايميل</label>
                    <input type="email"  name="email" class="form-control" value="{{old('email',$data->email)}}" placeholder="Enter ..." >
                  </div>
                  @error('email')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>رقم الهاتف</label>
                    <input type="text"  name="phone" class="form-control" value="{{old('phone',$data->phone)}}" placeholder="Enter ..." >
                  </div>
                  @error('phone')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text"  name="address" class="form-control" {{old('address',$data->teacherData['address'])}} placeholder="Enter ..." >
                  </div>
                  @error('address')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>المكافات الشهريه</label>
                    <input type="number"  name="tips" class="form-control" value="{{old('tips',$data->teacherData->tips)}}" placeholder="Enter ..." >
                  </div>
                  @error('tips')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>الصوره</label>
                    <input type="file" name="image" class="form-control" value="{{old('image',$data->image)}}"   id="choose-file">
                  </div>
                  @error('image')
                  <span style="color:red;">{{$message}}</span>
                  @enderror

                  <div id="img-preview">
                  </div>

                  <img src="{{asset('uploads/teachers/'.$data->image)}}" class="image-show" alt="">

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