<td>
    @if($status === Status::ACTIVE)
    <span class="label label-success">{{ trans('auth.status.active') }}</span>
    @else if($status === Status::UNACTIVE)
    <span class="label label-error">{{ trans('auth.status.unactive') }}</span>
    @endif
</td>