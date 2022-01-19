@php
     $prefix = Request::route()->getPrefix();
     $route =Route::current()->getName();
@endphp
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{(!empty($user->image))?asset('/upload/user_image/'.$user->image):asset('/upload/no_image.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->role=='admin')
          <li class="nav-item has-treeview {{($prefix=='/user')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-face-alt"></i>
              <p>
                 Manage User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('user.view')}}" class="nav-link {{($route=='user.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view user</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item has-treeview  {{($prefix=='/profile')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('profile.view')}}" class="nav-link {{($route=='profile.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your profile</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('password.view')}}" class="nav-link {{($route=='password.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>change password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  {{($prefix=='/logo')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Manage Logo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('logo.view')}}" class="nav-link  {{($route=='logo.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Logo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  {{($prefix=='/contact')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Manage Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('contact.view')}}" class="nav-link  {{($route=='contact.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  {{($prefix=='/slider')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Manage Slider
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('slider.view')}}" class="nav-link  {{($route=='slider.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview   {{($prefix=='/category')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('category.view')}}" class="nav-link  {{($route=='category.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview   {{($prefix=='/brand')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Brand
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('brand.view')}}" class="nav-link  {{($route=='brand.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view Brand</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview   {{($prefix=='/color')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Color
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('color.view')}}" class="nav-link  {{($route=='color.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Color</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview   {{($prefix=='/size')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Size
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('size.view')}}" class="nav-link  {{($route=='size.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview   {{($prefix=='/products')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Manage Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('products.view')}}" class="nav-link  {{($route=='products.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  {{($prefix=='/order')?'menu-open':''}}">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('Pandding.Order')}}" class="nav-link {{($route=='Pandding.Order')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>padding Order</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{route('Approved.Order')}}" class="nav-link {{($route=='Approved.Order')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Appreved Order</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
