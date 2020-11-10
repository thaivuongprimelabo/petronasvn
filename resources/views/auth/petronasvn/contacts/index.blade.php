@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="5%">
			<col width="20%">
			<col width="20%">
			<col width="10%">
			<col width="10%">
			<col width="15%">
			<col width="2%">
			<col width="2%">
		</colgroup>
		<thead>
			<tr>
				@include('auth.petronasvn.common.row_checkbox')
				<th>ID</th>
				<th>Tựa đề</th>
				<th>E-mail</th>
				<th>Số điện thoại</th>
				<th>Trạng thái</th>
				<th>Ngày gửi</th>
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
				<td>{{ $item->email }}</td>
				<td>{{ $item->phone }}</td>
                <td>
					@if($item->status === 0)
					<span class="label label-primary">{{ ContactStatus::getData($item->status) }}</span>
					@endif

					@if($item->status === 1)
					<span class="label label-success">{{ ContactStatus::getData($item->status) }}</span>
					@endif
				</td>
                @include('auth.petronasvn.common.row_date', ['created_at' => $item->created_at])
                @include('auth.petronasvn.common.row_button', ['id' => $item->id ])
            </tr>
            @endforeach
		</tbody>
	</table>
</div>
@endsection