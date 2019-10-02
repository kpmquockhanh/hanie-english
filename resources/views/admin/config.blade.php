@extends('admin.layouts.master')
@section('style')
@endsection
@section('page-header', 'Config landing page')
@section('option-des', 'Chỉnh sửa cấu hình trang landing')
@section('content')
    <form action="{{ route('admin.config.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="col-lg-12">
                        <button class="btn btn-success" style="margin-top: 10px;">Update</button>
                    </div>
                    @foreach($configs as $config)
                        <div class="col-lg-6">
                            @switch($config->type)
                                @case('text')
                                    <div class="cmp-tb-hd bsc-smp-sm">
                                        <label>{{ $config->name }}</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="" name="{{ $config->name }}" value="{{ $config->content }}">
                                        </div>
                                    </div>
                                    @break
                                @case('html')
                                    <div class="">
                                        <div class="cmp-tb-hd bsc-smp-sm">
                                            <label>{{ $config->name }}</label>
                                        </div>
                                        <textarea class="html-editor" id="{{ $config->name }}" name="{{ $config->name }}">{{ $config->content }}</textarea>
                                    </div>
                                    @break
                                @case('list')
                                    <div class="">
                                        <div class="cmp-tb-hd bsc-smp-sm">
                                            <label>{{ $config->name }}</label>
                                        </div>
                                        @foreach($configs as $config)
                                            @endforeach
                                    </div>
                                @break
                            @endswitch
                        </div>
                    @endforeach

                    <div class="col-lg-12">
                        <button class="btn btn-success" style="margin-top: 10px;">Update</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
@section('script')
    <!-- CK Editor -->
    <script src="{{ asset('node_modules//ckeditor/ckeditor.js') }}"></script>
    <script>
        // $(function () {
        //     // Replace the <textarea id="editor1"> with a CKEditor
        //     // instance, using default configuration.
        CKEDITOR.config.extraAllowedContent = 'iframe[*]';
        CKEDITOR.config.extraPlugins = 'sourcedialog';
        CKEDITOR.config.startupMode = 'source';
        @foreach($configs as $config)
            @if ($config->type == 'html')
                CKEDITOR.replace('{{ $config->name }}');
            @endif
        @endforeach
        //     //bootstrap WYSIHTML5 - text editor
        // })
    </script>
@stop