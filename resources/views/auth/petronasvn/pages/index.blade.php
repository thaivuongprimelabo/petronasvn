@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="20%">
			<col width="10%">
			<col width="10%">
			<col width="5%">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>Trang</th>
				<th>Ngày đăng ký</th>
				<th>Ngày cập nhật</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
            @foreach($data_list as $item)
			<tr>
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				@include('auth.petronasvn.common.row_date', ['created_at' => $item->created_at, 'updated_at' => $item->updated_at])
				@include('auth.petronasvn.common.row_button', ['id' => $item->id, 'remove' => false])
			</tr>
            @endforeach
		</tbody>
	</table>
</div>
@endsection