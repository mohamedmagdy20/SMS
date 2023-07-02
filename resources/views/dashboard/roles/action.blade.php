@switch($type)
    
        @case('actions')
            <a href="{{route('dashboard.roles.edit',$data->id)}}" class="btn btn-primary"><i class="fa fa-pencil text-white"></i></a>
            <a href="{{route('dashboard.permission.index',$data->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>
            @break
    @default
        
@endswitch