@switch($type)
    @case('image')
    <img src="{{$data->image ? asset('uploads/admins/'.$data->image) : asset('assets/dist/img/avatar.png')}}" style="width:60px" class="img-circle" alt="User Image">
        @break
        @case('actions')
            <a href="{{route('dashboard.admins.edit',$data->id)}}" class="btn btn-primary"><i class="fa fa-pencil text-white"></i></a>
            <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
        @break
    @default
        
@endswitch