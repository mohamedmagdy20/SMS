@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      تعديل طالب
      <small>الطالب</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard.students.index')}}"><i class="fa fa-dashboard"></i> طالب</a></li>
      <li class="active">تعديل طالب</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">تعديل طالب</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.students.update',$data->id)}}" enctype="multipart/form-data">
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
                    <input type="email"  name="email" value="{{old('email',$data->email)}}" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('email')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم الهويه</label>
                    <input type="text"  name="uid" class="form-control" value="{{old('uid',$data->studentData->uid)}}" placeholder="Enter ..." >
                  </div>
                  @error('uid')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>


            
            <div class="col-md-6">
                <div class="form-group">
                    <label>تاريخ الميلاد</label>
                    <input type="date"  name="date_of_birth" class="form-control" value="{{old('date_of_birth',$data->studentData->date_of_birth)}}" placeholder="Enter ..." >
                  </div>
                  @error('date_of_birth')
                  <span style="color:red;">{{$message}}</span>
                      
                  @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>الجنسيه</label>
                    <select name="gender" class="form-control select2 select2-hidden-accessible" style="width: 100%" >
                        <option value="male" {{$data->studentData->gender == 'male' ? 'selected' : ''}}>ذكر</option>
                        <option value="female" {{$data->studentData->gender == 'female' ? 'selected' : ''}}>انثي</option>
                    </select>
                  </div>
                  @error('gender')
                  <span style="color:red;">{{$message}}</span>      
                  @enderror
            </div>



            <div class="col-md-6">
                <div class="form-group">
                    <label>الفصل الدراسي</label>
                    <select name="semester_id" class="form-control select2 select2-hidden-accessible" style="width: 100%"  id="semester_id">
                        @foreach ($semeters as $semeter )
                            <option value="{{old('semester_id',$semeter->id) }}" {{$data->studentData->semester_id == $semeter->id ? 'selected' : ''}} >{{$semeter->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  @error('semester_id')
                  <span style="color:red;">{{$message}}</span>
                  @enderror
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>الغرف الدراسي</label>
                    <select name="class_id" class="form-control select2 select2-hidden-accessible" style="width: 100%" id="class_id">
                        @foreach ($classes as $class )
                            <option value="{{old('class_id',$class->id) }}"   {{$data->studentData->semester_id == $semeter->id ? 'selected' : ''}} >{{$class->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  @error('class_id')
                  <span style="color:red;">{{$message}}</span>
                  @enderror
            </div>
            <div class="col-md-6">
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
                    <input type="text"  name="address" value="{{old('address',$data->studentData->address)}}" class="form-control" placeholder="Enter ..." >
                  </div>
                  @error('address')
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

            <div class="col-md-6">
                <div class="">
                    <div class="checkbox checkbox-primary mb-2">
                        <input id="have_brother" type="radio"
                           
                            value="{{true}}" {{$data->studentData->have_brother == true ? 'checked' : ''}} name="have_brother" class="form-check-input" >
                        <label for="have_borther">لديك اخ ؟</label>
                    </div>
                </div>
            </div> <!-- end col-->


            <div class="col-md-6">
                <div class="">
                    <div class="checkbox checkbox-primary mb-2">
                        <input id="have_discount" type="radio"
                           
                            value="{{true}}" {{$data->studentData->have_discount == true ? 'checked' : ''}} name="have_discount" class="form-check-input" >
                        <label for="have_discount">لديك تخفيض ؟</label>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-12">
                <div class="form-group">
                    <label>الصوره</label>
                    <input type="file" name="image" class="form-control" value=""  id="choose-file">
                  </div>
                  @error('image')
                  <span style="color:red;">{{$message}}</span>
                  @enderror

                  <div id="img-preview"></div>
                  <img src="{{asset('uploads/students/'.$data->image)}}" class="image-show" alt="">

            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>صوره الهويه</label>
                    <input type="file" name="uid_image" class="form-control" value=""   id="choose-file">
                  </div>
                  @error('uid_image')
                  <span style="color:red;">{{$message}}</span>
                  @enderror

                  <div id="img-preview"></div>

                  <img src="{{asset('uploads/ui_images/'.$data->studentData->uid_image)}}" class="image-show" alt="">

            </div>



            <div class="col-md-12">
                <div class="form-group">
                    <label>صوره الشهاده</label>
                    <input type="file" name="certification_image" value="" class="form-control"   id="choose-file">
                  </div>
                  @error('certification_image')
                  <span style="color:red;">{{$message}}</span>
                  @enderror

                  <div id="img-preview"></div>

                  <img src="{{asset('uploads/certifications/'.$data->studentData->certification_image)}}" class="image-show" alt="">

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