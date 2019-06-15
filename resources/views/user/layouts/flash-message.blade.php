@if ($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $message }}
    </div>
@endif
@if ($message = session()->get('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $message }}
    </div>
@endif
@if ($message = session()->get('info'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ $message }}
    </div>
@endif