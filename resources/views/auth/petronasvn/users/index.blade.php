@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="3%">
			<col width="15%">
			<col width="10%">
			<col width="15%">
			<col width="10%">
			<col width="10%">
			<col width="15%">
			<col width="15%">
			<col width="2%">
			<col width="2%">
		</colgroup>
		<thead>
			<tr>
				@include('auth.petronasvn.common.row_checkbox')
				<th>ID</th>
				<th>Tên</th>
				<th>Ảnh đại diện</th>
				<th>E-mail</th>
				<th>Vai trò</th>
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
				@include('auth.petronasvn.common.row_checkbox', ['id' => $item->id])
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td>
                    <img src="{{ $item->getAvatar() }}" style="max-width:150px;max-height:200px" class="img img-thumbnail">
                </td>
				<td>{{ $item->email }}</td>
				<td><span class="label label-warning">Quản trị hệ thống</span></td>
				@include('auth.petronasvn.common.row_status', ['status' => $item->status])
                @include('auth.petronasvn.common.row_date', ['created_at' => $item->created_at, 'updated_at' => $item->updated_at])
				@include('auth.petronasvn.common.row_button', ['id' => $item->id])
			</tr>
            @endforeach
		</tbody>
	</table>
</div>
@endsection