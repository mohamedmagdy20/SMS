<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-right image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>الاداره</span>
            <i class="fa fa-angle-left pull-left mb-2"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('dashboard.admins.index')}}"><i class="fa fa-circle-o"></i> الادارين</a></li>
            
            <li><a href="{{route('dashboard.roles.index')}}"><i class="fa fa-circle-o"></i> الادوار و الصلاحيات </a></li>
          </ul>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>الشئون الدراسيه</span>
            <i class="fa fa-angle-left pull-left mb-2"></i>
          </a>
          <ul class="treeview-menu">
            <li>
              
              <a href="{{route('dashboard.subjects.index')}}">
                <i class="fa fa-th"></i> <span>المواد الدراسيه</span> 
              </a>
            </li>

            <li>
              <a href="{{route('dashboard.semester.index')}}">
                <i class="fa fa-th"></i> <span> المراحل الدراسيه</span> 
              </a>
            </li>

            
            <li>
              <a href="{{route('dashboard.semester.index')}}">
                <i class="fa fa-th"></i> <span> الفصول الدراسيه</span> 
              </a>
            </li>


          </ul>
        </li>


        <li><a href="{{route('dashboard.teachers.index')}}"><i class="fa fa-users"></i> المعلمين</a></li>

        <li><a href="{{route('dashboard.students.index')}}"><i class="fa fa-users"></i> الطلاب</a></li>


      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
