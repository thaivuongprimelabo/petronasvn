<td>
    @if($status === Status::ACTIVE)
    <span class="label label-success">{{ trans('auth.status.active') }}</span>
    @elseif($status === Status::UNACTIVE)
    <span class="label label-danger">{{ trans('auth.status.unactive') }}</span>
    @endif
</td>