
<li>
    <i class="fa fa-user-circle bg-blue"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> {{ $history->created_at->diffForHumans() }}</span>

        <h3 class="timeline-header"><a href="#">{{ $history->admin->name }}</a> <strong>{{ $history->action }}</strong> {{ $history->table }}</h3>

    </div>
</li>