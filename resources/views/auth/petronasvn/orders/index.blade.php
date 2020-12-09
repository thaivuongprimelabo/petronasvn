@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="3%">
			<col width="10%">
			<col width="15%">
			<col width="15%">
			<col width="10%">
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
				<th>Tên khách hàng</th>
				<th>E-mail</th>
				<th>Địa chỉ</th>
				<th>Điện thoại</th>
				<th>Trạng thái</th>
				<th>Ngày đặt hàng</th>
				<th>Ngày cập nhật</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
            @foreach($data_list as $item)
			<tr>
				@include('auth.petronasvn.common.row_checkbox', ['id' => $item->id])
				<td>{{ $item->id }}</td>
				<td>{{ $item->customer_name }}</td>
				<td>{{ $item->customer_email }}</td>
				<td>{{ $item->customer_address }}</td>
				<td>{{ $item->customer_phone }}</td>
				<td>
                    @if($item->status == StatusOrders::ORDER_SHIPPING)
                    <span class="label label-warning">{{ trans('auth.status.order_shipping') }}</span>
                    @elseif($item->status == StatusOrders::ORDER_DONE)
                    <span class="label label-success">{{ trans('auth.status.order_done') }}</span>
                    @elseif($item->status == StatusOrders::ORDER_CANCEL)
                    <span class="label label-danger">{{ trans('auth.status.order_cancel') }}</span>
					@else
					<span class="label label-primary">{{ trans('auth.status.order_new') }}</span>
                    @endif
                </td>
				@include('auth.petronasvn.common.row_date', ['created_at' => $item->created_at, 'updated_at' => $item->updated_at])
                @include('auth.petronasvn.common.row_button', ['id' => $item->id])
			</tr>
            @endforeach
		</tbody>
	</table>
</div>
@endsection