@switch($type)
    
        @case('actions')
            <a href="{{route('dashboard.distribution.edit',$data->id)}}" class="btn btn-primary"><i class="fa fa-pencil text-white"></i></a>
            <a onclick="deleteConfirmation({{$data->id}})" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
        @break
    @default
        
@endswitch