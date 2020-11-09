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
			<col width="5%">
			<col width="5%">
		</colgroup>
		<thead>
			<tr>
				<th>
					<div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" id="select_all" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
				</th>
				<th>ID</th>
				<th>Tựa đề</th>
				<th>Hình ảnh</th>
				<th>Mô tả ngắn</th>
				<th>Trạng thái</th>
				<th>Ngày xuất bản</th>
				<th>Ngày đăng ký</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr align="center">
				<td colspan="9">(Chưa có dữ liệu)</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection