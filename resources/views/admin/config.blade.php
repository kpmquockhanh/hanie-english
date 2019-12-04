@extends('admin.layouts.master')
@section('style')
@endsection
@section('page-header', 'Config landing page')
@section('option-des', 'Chỉnh sửa cấu hình trang landing')
@section('content')
    <form action="{{ route('admin.config.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="col-lg-12">
                        <button class="btn btn-success" style="margin: 10px 0;">Update</button>
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
                                    </div>
                                @break
                            @endswitch
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cmp-tb-hd bsc-smp-sm col-lg-12">
                    <label>Banner images</label>
                </div>
                @for ($i = 0; $i < 3; $i++)
                    <div class="col-lg-4">
                        <div class="dash-circle" style="display: flex; justify-content: center;">
                            <img class="preview-img" onerror="this.src='https://dummyimage.com/500/000000/fff.jpg&text=Error+image';" src="{{ isset($bannerImgs[$i]) ? $bannerImgs[$i]->imageUrl : 'https://dummyimage.com/500/000000/fff.jpg&text=Banner+image' }}" alt="" style="width: 100%; border-radius: 5px; cursor: pointer">
                        </div>
                        <input type="file" class="image-upload" name="image_banner[]" hidden style="display: none;"/>
                    </div>
                @endfor


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-12">
                    <div class="cmp-tb-hd bsc-smp-sm">
                        <label>Home image</label>
                    </div>
                    <div class="dash-circle" style="display: flex; justify-content: center;">
                        <img class="preview-img" src="{{ $homeImg ? $homeImg->imageUrl : 'https://dummyimage.com/500/000000/fff.jpg&text=Home+image' }}" alt="" style="height: 200px; border-radius: 5px; cursor: pointer">
                    </div>
                    <input type="file" class="image-upload" name="image_landing_home" hidden style="display: none;"/>
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

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(input).siblings('.dash-circle').find('.preview-img').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".image-upload").change(function() {
            readURL(this);
        });
        $('.dash-circle').click(function (e) {
            e.preventDefault();
            $(this).siblings('.image-upload').trigger('click');
        });

    </script>
@stop