<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li class="nav-item">
          <a href="{{route('admin.categories.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th-list"></i>
            <p>
              {{__('Categories')}}
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('admin.tags.index')}}" class="nav-link">
            <i class="nav-icon fas fa-hashtag"></i>
            <p>
              {{__('Tags')}}
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('admin.posts.index')}}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              {{__('Posts')}}
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              {{__('Users')}}
            </p>
          </a>
        </li>

      </ul>
    </div>
    <!-- /.sidebar -->
  </aside>