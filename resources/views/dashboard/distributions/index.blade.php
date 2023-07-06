@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        توزيع المواد علي المدرسين
      <small>عرض توزيع المواد علي المدرسين</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> لوحه التحكم</a></li>
      <li class="active">توزيع المواد علي المدرسين</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
        
      <div class="col-xs-12">
        
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">توزيع المواد علي المدرسين</h3>
          </div><!-- /.box-header -->

          <div class="text-center">
            <a href="{{route('dashboard.distribution.create')}}" class="btn btn-primary">اضافه +</a>
        </div>
          <div class="box-body">
            <table id="DistributionDataTables" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>اسم المعلم</th>
                  <th>المواد الدراسيه</th>
                  <th>الغرف</th>
                  <th>الفصل الدراسي</th>
                  <th>اليوم</th>
                  <th>الوقت</th>
                  <th>العمليات</th>
                </tr>
              </thead>
             <tbody>

             </tbody>
              
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

        
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section>

@endsection

@section('js')
<script>

    
let DistributionTable = null

function setDistributionDatatable() {
    var url = "{{ route('dashboard.distribution.data') }}";
    
    DistributionTable = $("#DistributionDataTables").DataTable({
        processing: true,
        serverSide: true,
        dom: 'Blfrtip',
        lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],
        pageLength: 9,
        sorting: [0, "DESC"],
        ordering: false,
        ajax: url,
        
        language: {
            paginate: {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            },
        },

        
        columns: [
            {
                data: 'user.name'
            },
            {
                data: 'subject.name'
            },
            {
                data: 'classes.name'
            },
            {
                data: 'semester.name'
            },
            {
                data: 'days.name'
            },
            {
                data: 'time'
            },
            {
                data: 'actions'
            }
        ],
    });
}

setDistributionDatatable();



function deleteConfirmation(id) {
        swal({
            title: "مسح ؟",
            text: "هل انت متاكد من مسح هذه البانات",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "نعم",
            cancelButtonText: "لا",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: "{{url('dashboard/distribution/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                            console.log(results);
                            if(results.status == true)
                            {
                                swal("Done!", results.message, "success");
                                DistributionTable.ajax.reload()
                            }
                
                    },
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

</script>
@endsection