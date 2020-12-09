@if(isset($created_at))
<td>{{ Utils::formatDate($created_at) }}</td>
@endif

@if(isset($updated_at))
<td>{{ Utils::formatDate($updated_at) }}</td>
@endif
