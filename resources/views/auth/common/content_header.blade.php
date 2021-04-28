<section class="content-header">
  <h1>
  	@php
      $route = Route::currentRouteName();
      $title = '';
      if($route == 'auth_' . $name . '_create') {
        $title = trans('auth.' . $name . '.create_title');
      }
  		
  		if($route == 'auth_' . $name . '_edit') {
  			$title =  trans('auth.' . $name . '.edit_title');
  		}

      if($route == 'auth_' . $name . '_copy') {
  			$title =  trans('auth.' . $name . '.copy_title');
  		}

      if($route == 'auth_config') {
        $title =  trans('auth.' . $name . '.edit_title');
      }

  	@endphp
    {{ $title }}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('auth_dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li><a href="{{ route('auth_' . $name) }}">{{ trans('auth.' . $name . '.list_title') }}</a></li>
    <li class="active">{{ $title }}</li>
  </ol>
</section>