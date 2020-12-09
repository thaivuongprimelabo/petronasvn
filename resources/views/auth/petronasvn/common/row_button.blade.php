@if(!isset($remove))
<td align="center"><a href="javascript:void(0)" data-url="{{ route('auth_' . $name . '_remove') }}" data-id="{{ $id }}" class="remove-row" title="Remove"><i class="fa fa-trash" aria-hidden="true" style="font-size: 24px; color:#333333"></i></a></td>
@endif
@if(!isset($edit))
<td align="center"><a href="javascript:void(0)" data-url="{{ route('auth_' . $name . '_edit', ['id' => $id]) }}" class="edit" title="Edit"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 24px; color:#333333"></i></a></td>
@endif