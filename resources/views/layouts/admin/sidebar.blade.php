<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('template/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MANAGEMENT POST</li>
          @can('manage_posts')
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Posts
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lihat Posts</p>
                    </a>
                </li>
                @can('post_create')
                <li class="nav-item">
                    <a href="{{ route('posts.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Posts</p>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
          @endcan
          @can('manage_categories')
            <li class="nav-item">
                <a href="" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Categories
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List Category</p>
                    </a>
                </li>
                @can('category_create')
                <li class="nav-item">
                    <a href="{{ route('category.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Category</p>
                    </a>
                </li>
                @endcan
                </ul>
            </li>
          @endcan
          @can('manage_tags')
            <li class="nav-item {{ set_active(['tags.index','tags.create']) }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Tags
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tags.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List Tags</p>
                        </a>
                    </li>
                    @can('tag_create')
                    <li class="nav-item">
                        <a href="{{ route('tags.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Tags</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
          @endcan
          <li class="nav-header">MANAGEMENT USERS</li>
          @can('manage_users')
          <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    Users
                </p>
              </a>
          </li>
          @endcan
          @can('manage_roles')
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          @endcan

          <li class="nav-header">MANAGEMENT FILES</li>
          <li class="nav-item">
            <a href="{{ route('filemanager.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                File
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
