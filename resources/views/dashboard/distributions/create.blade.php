@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
      اضافه التوزيع علي المدرس
      <small>الفصول</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard.classes.store')}}"><i class="fa fa-dashboard"></i> المواد الدراسيه</a></li>
      <li class="active">اضافه التوزيع علي المدرس</li>
    </ol>
  </section>
<section class="content">
    <div class="row">
<div class="col-md-12">
    <!-- general form elements disabled -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">اضافه التوزيع علي المدرس</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form method="POST" action="{{route('dashboard.distribution.store')}}" enctype="multipart/form-data">
            @csrf
          <!-- text input -->
          <div class="row">
        

            <div class="col-md-6">
              <div class="form-group">
                  <label>الفصل الدراسي</label>
                  <select name="semester_id" class="form-control select2 select2-hidden-accessible" style="width: 100%" id="semester_id">
                      @foreach ($semesters as $semeter )
                          <option value="{{old('semester_id',$semeter->id) }}" >{{$semeter->name}}</option>
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
                          <option value="{{old('class_id',$class->id) }}" >{{$class->name}}</option>
                      @endforeach
                  </select>
                </div>
                @error('class_id')
                <span style="color:red;">{{$message}}</span>
                @enderror
          </div>
          {{--Start Schdule --}}
          <div class="col-md-12">
            <div class="form-group" {{$errors->has('description') ? 'has-error' : ''}}>
            <label for="">{{ __('lang.schdule') }}3</label>

            <div class="table-responsive">
                <table  style="margin-top: 10px;" class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                      <tr>
                        <th>اليوم</th>
                        <th>الحصه الاولي</th>
                        <th>الحصه الثانيه</th>
                        <th>الحصه الثالثه</th>
                        <th>الحصه الرابعه</th>
                        <th>الحصه الخامسه</th>
                        <th>الحصه السادسه</th>
                        <th>الحصه السابعه</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> <input type="hidden" name="days[]" value="1"> الوقت </td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time') }}"></td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time')}}"></td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time') }}"></td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time') }}"></td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time') }}"></td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time') }}"></td>
                        <td><input type="time" class="form-control" name="time[]" value="{{ old('time') }}"></td>
                
                      </tr>

                        <tr>
                            <td> <input type="hidden" name="days[]" value="1"> السبت </td>
                            <td>
                            <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                            </td>


                            <td>
                             <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>

                            <td>
                            
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                    
                          </tr>

                        <tr>
                          <td> <input type="hidden" name="days[]" value="2"> الاحد </td>
                           
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                       
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                        </tr>

                        <tr>
                            <td> <input type="hidden" name="days[]" value="3"> الاثنين </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                       
                           </tr>

                        <tr>
                          <td> <input type="hidden" name="days[]" value="4"> الثلاثاء </td>

                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                       
                        </tr>

                        <tr>
                          <td> <input type="hidden" name="days[]" value="5"> الاربعاء </td>
                        
                          <td>
                            
                            <select name="user_id[]" class="form-control " id="user_id">
                              @foreach ($users as $teacher )
                                  <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                              @endforeach
                          </select>

                          <br>
                          
                          <select name="subject_id[]" class="form-control " id="subject_id">
                            @foreach ($subjects as $subject )
                                <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                            @endforeach
                          </select>
                         
                          </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                       
                        </tr>
                        <tr>
                          <td> <input type="hidden" name="days[]" value="6"> الخميس </td>

                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                       
                        </tr>
                  
                        <tr>
                          <td> <input type="hidden" name="days[]" value="7"> الجمعه </td>

                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                            <td>
                              
                              <select name="user_id[]" class="form-control " id="user_id">
                                @foreach ($users as $teacher )
                                    <option value="{{old('user_id',$teacher->id) }}" >{{$teacher->name}}</option>
                                @endforeach
                            </select>

                            <br>
                            
                            <select name="subject_id[]" class="form-control " id="subject_id">
                              @foreach ($subjects as $subject )
                                  <option value="{{old('subject_id',$subject->id) }}" >{{$subject->name}}</option>
                              @endforeach
                            </select>
                           
                            </td>
                       
                         </tr>
                       
                      
                  
                        </tbody>
                  </table>
        
            </div>
            </div>
        </div>
          {{-- End  --}}

          </div>
        <input type="submit" value="حفظ" class="btn btn-primary">
        </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
    </div>
</section>
@endsection