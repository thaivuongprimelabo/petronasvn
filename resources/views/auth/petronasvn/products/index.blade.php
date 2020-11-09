@extends('auth.petronasvn.ajax_list')
@section('table')
<div class="table-responsive">
	<table class="table table-hover" style="word-wrap:break-word;">
		<colgroup>
			<col width="3%">
			<col width="3%">
			<col width="15%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
			<col width="10%">
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
				<th>Tên sản phẩm</th>
				<th>Hình ảnh</th>
				<th>Loại SP</th>
				<th>Giá bán (VNĐ)</th>
				<th>Trạng thái</th>
				<th>Còn/Hết hàng</th>
				<th>Ngày đăng ký</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
            @foreach($data_list as $item)
			<tr>
				<td>
					<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="row-delete" value="95" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
				</td>
				<td>{{ $item->id }}</td>
				<td>{{ $item->name }}</td>
				<td>
                    <img src="{{ $item->getFirstImage('small') }}" style="max-width:50px;max-height:200px" class="img img-thumbnail">
                </td>
				<td>
                    {{ $item->getCategoryName() }}
                </td>
				<td>{{ Utils::formatCurrency($item->price) }}</td>
				@include('auth.petronasvn.common.row_status', ['status' => $item->status ])
				<td>
                    @if($item->status === ProductStatus::AVAILABLE)
                    <span class="label label-success">{{ trans('auth.status.available') }}</span>
                    @else if($item->status === ProductStatus::OUT_OF_STOCK)
                    <span class="label label-error">{{ trans('auth.status.out_of_stock') }}</span>
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