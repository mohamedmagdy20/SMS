@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        الطلاب
      <small>عرض الطلاب</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> لوحه التحكم</a></li>
      <li class="active">الطلاب</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
        
      <div class="col-xs-12">
        
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">الطلاب</h3>
          </div><!-- /.box-header -->

          <div class="text-center">
            <a href="{{route('dashboard.students.create')}}" class="btn btn-primary">اضافه +</a>
        </div>
          <div class="box-body w-100">
            <table id="TeachersDataTables" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>الاسم</th>
                  <th>اسم المستخدم</th>
                  <th>رقم الهاتف</th>
                  <th>الصوره</th>
                  <th>العنوان</th>
                  <th>تاريخ الميلاد</th>
                  <th>الجنسيه</th>
                  <th>رقم الهويه</th>
                  <th>الفصل الدراسي الحالي</th>
                  <th>الغرفه</th>
                  <th>لديه اخ</th>
                  <th>لديه تخفيض</th>
                  <th>صوره الهويه</th>
                  <th>صوره الشهاده</th>
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

    
let SubjectTable = null

function setSubjectDatatable() {
    var url = "{{ route('dashboard.students.data') }}";
    
    SubjectTable = $("#TeachersDataTables").DataTable({
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
                data: 'name'
            },
            {
                data: 'email'
            },
            {
              data:'phone'
            },
            {
              data:'image'
            },
            {
                data: 'student_data.address'
            },
            {
                data: 'student_data.date_of_birth'
            },
            {
                data: 'student_data.gender'
            },
            {
                data: 'student_data.uid'
            },
           
            {
                data: 'semester'
            },
            {
                data: 'class'
            },
            {
                data: 'student_data.have_brother'   
            },
            {
                data: 'student_data.have_discount'   
            },
            {
                data: 'uid_image'   
            },
            {
                data: 'certification_image'   
            },
            {
                data:'actions'
            }
        ],
    });
}

setSubjectDatatable();



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
                    url: "{{url('dashboard/students/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                            console.log(results);
                            if(results.status == true)
                            {
                                swal("Done!", results.message, "success");
                                SubjectTable.ajax.reload()
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