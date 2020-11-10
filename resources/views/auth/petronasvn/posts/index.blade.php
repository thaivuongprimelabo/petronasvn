@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="3%">
			<col width="45%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
			<col width="2%">
			<col width="2%">
		</colgroup>
		<thead>
			<tr>
				@include('auth.petronasvn.common.row_checkbox')
				<th>ID</th>
				<th>Tựa đề</th>
				<th>Trạng thái</th>
				<th>Ngày đăng ký</th>
				<th>Ngày cập nhật</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($data_list as $item)
            <tr>
                @include('auth.petronasvn.common.row_checkbox', ['id' => $item->id ])
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                @include('auth.petronasvn.common.row_status', ['status' => $item->status ])
                @include('auth.petronasvn.common.row_date', ['created_at' => $item->created_at, 'updated_at' => $item->updated_at])
                @include('auth.petronasvn.common.row_button', ['id' => $item->id ])
            </tr>
            @endforeach
		</tbody>
	</table>
</div>
@endsection