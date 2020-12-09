@if(isset($id))
<td>
    <input type="checkbox" class="row-delete" value="{{ $id }}" />
</td>
@else
<th>
    <input type="checkbox" id="select_all" />
</th>
@endif
