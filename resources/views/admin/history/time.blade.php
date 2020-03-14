
<li>
    <i class="fa fa-user-circle bg-blue"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{ $history->created_at->diffForHumans() }}</span>

        <h3 class="timeline-header"><a href="#">{{ $history->admin->name }}</a> <strong>{{ $history->action }}</strong>

            @if (\Route::has($history->table.'.index'))
                <a href="{{ route($history->table.'.index') }}">{{ $history->table }}</a>
            @else
                {{ $history->table }}
            @endif
        </h3>

    </div>
</li>