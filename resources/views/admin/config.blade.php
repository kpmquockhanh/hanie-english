@extends('admin.layouts.master')
@section('style')
    <link rel="stylesheet" href="/dashboard/css/summernote/summernote.css">
@endsection
@section('content')
    <div>
        <div class="container">
            <div class="basic-tb-hd">
                <h2>Config</h2>
                <p>Chỉnh sửa cầu hình trang landing </p>
            </div>
            <form action="{{ route('admin.config.update') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-list">
                            @foreach($configs as $config)
                                @if ($config->type == 'text')
                                    <div class="cmp-tb-hd bsc-smp-sm">
                                        <label>{{ $config->name }}</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="" name="{{ $config->name }}" value="{{ $config->content }}">
                                        </div>
                                    </div>
                                @endif
                                @if ($config->type == 'html')
                                    <div class="summernote-area">
                                        <div class="cmp-tb-hd bsc-smp-sm">
                                            <label>{{ $config->name }}</label>
                                        </div>
                                        <textarea class="html-editor" name="{{ $config->name }}">{{ $config->content }}</textarea>
                                    </div>
                                @endif
                            @endforeach

                            <div>
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('script')
    <!--  summernote JS
		============================================ -->
    <script src="/dashboard/js/summernote/summernote-updated.min.js"></script>
    <script src="/dashboard/js/summernote/summernote-active.js"></script>
@stop