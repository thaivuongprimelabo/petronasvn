@extends('layouts.app')

@section('content')
@include('auth.common.content_header')
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form role="form" id="submit_form" action="?" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-md-6">
        			<div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">{{ trans('auth.orders.order_info_title') }}</h3>
                        </div>
                    	<div class="box-body">
                    		@php
                    			$table_infos = trans('auth.' . $name . '.table_product_header');
                    		@endphp
                    		<table class="table table-hover" style="table-layout: fixed; word-wrap:break-word;">
                    			<thead>
                    				<tr>
                        				@foreach($table_infos as $tbl)
                        				<col width="{{ $tbl['width'] }}">
                        				@endforeach
                        				@foreach($table_infos as $tbl)
                        				<th>{{ $tbl['text'] }}</th>
                        				@endforeach
                    				</tr>
                    			</thead>
                    			<tbody>
                    				@foreach($data->getOrderDetails() as $orderDetail)
                    				<tr>
                    					<td>{{ $orderDetail->product_id }}</td>
                        				<td>{!! $orderDetail->name !!}</td>
                        				<td>{{ $orderDetail->qty }}</td>
                        				<td>{{ $orderDetail->getPrice() }}</td>
                        				<td>{{ $orderDetail->getCost() }}</td>
                    				</tr>
                    				@endforeach
                    			</tbody>
                    			<tfoot>
                    				<tr>
                    					<td colspan="3" align="right">
                    					<td><b>{{ trans('auth.orders.subtotal_txt') }}</b></td>
                    					<td>{{ $data->getSubTotal() }}</td>
                    				</tr>
                    				<tr>
                    					<td colspan="3" align="right">
                    					<td><b>{{ trans('auth.orders.ship_fee_txt') }}</b></td>
                    					<td>{{ $data->getShipFee() }}</td>
                    				</tr>
                    				<tr>
                    					<td colspan="3" align="right">
                    					<td><b>{{ trans('auth.orders.total_txt') }}</b></td>
                    					<td>{{ $data->getTotal() }}</td>
                    				</tr>
                    			</tfoot>
                    		</table>
                    	</div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin khách hàng</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group"><label>Tên khách hàng:&nbsp;&nbsp;</label><span>{{ $data->customer_name }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>E-mail:&nbsp;&nbsp;</label><span>{{ $data->customer_email }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Địa chỉ giao hàng:&nbsp;&nbsp;</label><span>{{ $data->customer_address }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Tỉnh/thành phố:&nbsp;&nbsp;</label><span>{{ $data->customer_province }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Quận/huyện:&nbsp;&nbsp;</label><span>{{ $data->customer_district }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Số điện thoại:&nbsp;&nbsp;</label><span>{{ $data->customer_phone }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Phương thức chi trả:&nbsp;&nbsp;</label><span>{{ trans('auth.payment_methods.' . $data->payment_method) }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Ghi chú:&nbsp;&nbsp;</label><span>{{ $data->customer_note }}</span><span class="help-block"></span></div>
                        <div class="form-group"><label>Ngày đặt hàng:&nbsp;&nbsp;</label><span>{{ Utils::formatDate($data->created_at) }}</span><span class="help-block"></span></div>
                        <div class="form-group">
                            <label>Trạng thái đơn hàng:&nbsp;&nbsp;</label>
                            <div>
                                <select class="form-control" name="status" id="status">
                                    @foreach(StatusOrders::getData() as $value=>$status)
                                    <option value="{{ $value }}" @if($data->status === $value) selected @endif>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="box-footer">
                        @include('auth.petronasvn.common.group_button')
                    </div>
                </div>
    			</div>
            </form>
		</div>
	</div>
</section>
@endsection