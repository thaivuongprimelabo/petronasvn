@extends('layouts.petronasvn.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{ trans('auth.' . $name . '.list_title') }}
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('auth_dashboard') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
    <li class="active">{{ trans('auth.' . $name . '.list_title') }}</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-xs-12">
          @include('auth.petronasvn.common.search')
          <div class="box">
            <!-- /.box-header -->
            <div id="ajax_list">
                @include($view)
            </div>
          </div>
          <!-- /.box -->
        </div>
  	</div>
</section>
@endsection