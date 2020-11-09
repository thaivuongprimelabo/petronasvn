@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="3%">
			<col width="10%">
			<col width="10%">
			<col width="15%">
			<col width="10%">
			<col width="10%">
			<col width="15%">
			<col width="15%">
			<col width="5%">
			<col width="5%">
		</colgroup>
		<thead>
			<tr>
				<th>
					<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" id="select_all" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
				</th>
				<th>ID</th>
				<th>Tên</th>
				<th>Ảnh đại diện</th>
				<th>E-mail</th>
				<th>Quyền hạn</th>
				<th>Trạng thái</th>
				<th>Ngày đăng ký</th>
				<th>Lần cuối đăng nhập</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
            @foreach($data_list as $item)
			<tr>
				<td>
					<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="row-delete" value="6" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
				</td>
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td>
                    <img src="{{ $item->getAvatar() }}" style="max-width:150px;max-height:200px" class="img img-thumbnail">
                </td>
				<td>{{ $item->email }}</td>
				<td><a href="javascript:void(0)"><span class="label label-warning">Quản trị hệ thống</span></a></td>
				@include('auth.petronasvn.common.row_status', ['status' => $item->status])
                @include('auth.petronasvn.common.row_date', ['created_at' => $item->created_at, 'updated_at' => $item->updated_at])
				@include('auth.petronasvn.common.row_button', ['id' => $item->id])
			</tr>
            @endforeach
		</tbody>
	</table>
</div>
@endsection