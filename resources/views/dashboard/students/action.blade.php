@switch($type)
    @case('image')
    <img src="{{$data->image ? asset('uploads/students/'.$data->image) : asset('assets/dist/img/avatar.png')}}" onclick="viewImg(this)" style="width:60px" class="img-circle" alt="User Image">
    @break
    @case('actions')
        <a href="{{route('dashboard.students.edit',$data->id)}}" class="btn btn-primary"><i class="fa fa-pencil text-white"></i></a>
        <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
    @break
    @case('uid_image')
        <img src="{{$data->studentData->uid_image ? asset('uploads/ui_images/'.$data->studentData->uid_image) : asset('assets/dist/img/avatar.png')}}" onclick="viewImg(this)" style="width:60px" class="img-circle" alt="User Image">
    @break

    @case('certification_image')
        <img src="{{$data->studentData->certification_image ? asset('uploads/certifications/'.$data->studentData->certification_image) : asset('assets/dist/img/avatar.png')}}" onclick="viewImg(this)" style="width:60px" class="img-circle" alt="User Image">
    @break
    @default
        
@endswitch