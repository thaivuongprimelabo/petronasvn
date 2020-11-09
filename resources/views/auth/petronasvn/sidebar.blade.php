<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ Auth::user()->getAvatar() }}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  @php
    $route = Route::currentRouteName();
    $name = str_replace('auth_', '', str_replace('_search', '', Route::currentRouteName()));
    $sidebar = [
      'products' => ['name' => 'Sản phẩm', 'icon' => 'fa fa-archive'],
      'categories' => ['name' => 'Loại Sản phẩm', 'icon' => 'fa fa-list'],
      'orders' => ['name' => 'Đơn hàng', 'icon' => 'fa fa-cart-plus'],
      'banners' => ['name' => 'Banner', 'icon' => 'fa fa-file-image-o'],
      'posts' => ['name' => 'Bài viết', 'icon' => 'fa fa-book'],
      'pages' => ['name' => 'Trang nội dung', 'icon' => 'fa fa-book'],
      'contacts' => ['name' => 'Liên hệ', 'icon' => 'fa fa-envelope-o'],
      'users' => ['name' => 'Tài khoản', 'icon' => 'fa fa-user-o'],
      'config' => ['name' => 'Cài đặt', 'icon' => 'fa fa-wrench']
    ]
  @endphp
  <ul class="sidebar-menu tree" data-widget="tree">
    @foreach($sidebar as $route=>$value)
    <li class="@if($name == $route) active @endif">
      <a href="{{ $route }}">
        <i class="{{ $value['icon'] }}"></i><span>{{ $value['name'] }}</span>
      </a>
    </li>
    @endforeach
    
</ul>
</section>
<!-- /.sidebar -->
</aside>