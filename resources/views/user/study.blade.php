@extends('user.layouts.master')
@section('style')
    <link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
@endsection
@section('option-des')
    List courses
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    {{ $lesson->name }}
                </div>
                <div class="box-body">
                    <video
                            id="player"
                            class="video-js"
                            controls
                            autoplay
                            preload="auto"
                            data-setup='{}' style="width: 100%;">
                        @if ($lesson->video->hls_path)
                            <source src="{{ $lesson->video->hls_path }}" type="application/x-mpegURL">
                        @else
                            <source src="{{ $lesson->video->url_path }}" type="video/mp4">
                        @endif

                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">
                                supports HTML5 video
                            </a>
                        </p>
                    </video>
                </div>
                <div class="box-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src='{{ asset('node_modules/video.js/dist/video.min.js') }}'></script>
    <script src="{{ asset('node_modules/videojs-contrib-hls/dist/videojs-contrib-hls.min.js') }}"></script>
    <script src="{{ asset('node_modules/axios/dist/axios.min.js') }}"></script>
    <script>
        var options = {
            autoplay: false
        };

        const player = videojs('player', options);

        player.on('error', function(e) {
           console.log(e)
        });
        player.ready(function(e) {
            axios.post('{{ route('dashboard.processLesson') }}', {
                user_id: '{{ \Illuminate\Support\Facades\Auth::guard('user')->id() }}',
                lesson_id: '{{ $lesson->id }}',
            })
            // alert();
        });
    </script>
@stop