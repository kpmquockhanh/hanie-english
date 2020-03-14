<script src="{{ asset('lp/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('lp/js/jquery-migrate-3.0.1.min.js') }}"></script>
{{--<script src="{{ asset('lp/js/jquery-ui.js') }}"></script>--}}
<script src="{{ asset('lp/js/popper.min.js') }}"></script>
<script src="{{ asset('lp/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lp/js/owl.carousel.min.js') }}"></script>
{{--<script src="{{ asset('lp/js/jquery.stellar.min.js') }}"></script>--}}
{{--<script src="{{ asset('lp/js/jquery.countdown.min.js') }}"></script>--}}
{{--<script src="{{ asset('lp/js/bootstrap-datepicker.min.js') }}"></script>--}}
<script src="{{ asset('lp/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('lp/js/aos.js') }}"></script>
{{--<script src="{{ asset('lp/js/jquery.fancybox.min.js') }}"></script>--}}
<script src="{{ asset('lp/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('node_modules/axios/dist/axios.min.js') }}"></script>
<script src="{{ asset('lp/fa/js/all.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
        integrity="sha256-rXnOfjTRp4iAm7hTAxEz3irkXzwZrElV2uRsdJAYjC4=" crossorigin="anonymous">
</script>


<script src="{{ asset('lp/js/main.js') }}"></script>
<script>
    $("img").lazyload();
    initCarousel();
    function initCarousel () {

        $('.carousel-overal').owlCarousel({
            loop: true,
            margin: 10,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000,
            // autoplayHoverPause: true
        });
        $('.owl-carousel-banner').owlCarousel({
            loop: true,
            margin: 0,
            items: 3,
            autoplay: true,
            autoplayTimeout: 3000,
            lazyLoad: true,
            nav: false,
            center: true
            // autoplayHoverPause: true
        });
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            items: 3,
            autoplay: false,
            autoplayTimeout: 3000,
            lazyLoad: true,
            dots: false,
            nav: false,
            center: true
            // autoplayHoverPause: true
        });
    }
    $('body').on('click', '#active-about-model', function (e) {
        e.preventDefault();
        console.log(this);
        console.log($(this).data('name'));

        const levelName = $(this).data('name');
        const levelId = $(this).data('id');
        $('.model-container').find('#level-name-filled').html(`cho ${levelName}`);
        $('.model-container').find('#ad-level').val(levelId);

        // Clear form
        $('#error-message').html('');
        $('.model-container #ad-name').val('');
        $('.model-container #ad-phone').val('');
        $('.model-container #ad-email').val('');

        $('.model-container').fadeIn();
    });
    $('body').on('click', '.model-container #btn-close-model', function (e) {
        e.preventDefault();
        const target = $(e.target);
        target.parents('.model-container').fadeOut();
    });
    $('body').on('click', '#submit-advisory', function (e) {
        e.preventDefault();
        const name = $('.model-container #ad-name').val();
        const phone = $('.model-container #ad-phone').val();
        const email = $('.model-container #ad-email').val();
        const levelId = $('.model-container #ad-level').val();
        makeLoadingAnimate();
        axios.post('{{ route('landing.create.advisory') }}', {
            name,
            phone,
            email,
            levelId
        }).then(res => {
            if (!res.data.status && res.data.code !== 422) {
                console.log(res);
                return
            }
            clearLoadingAnimate();
            if (res.data.code === 422) {
                $('#error-message').html('Vui lòng nhập đúng các trường bên dưới');
                return
            }
            // open modal link
            clearAdvisoryModel();

            setLink(res);
            $('.model-container').fadeOut();
            $('.model-link-test-container').fadeIn();
        }).catch(function (err) {
            console.log(err)
        })
    });
    $('body').on('click', '.model-link-test-container #btn-close-model', function (e) {
        e.preventDefault();
        const target = $(e.target);
        target.parents('.model-link-test-container').fadeOut();
    });
    function clearAdvisoryModel() {
        const model = $('.model-container');
        model.find('input').not('[type="button"]').val('');
    }
    function setLink(res) {
        const {link} = res.data;
        const linkList = $('.model-link-test-container #links-list');
        linkList.html('');
        if (link) {
            linkList.append(`<div class="form-group row">
                    <div class="col-md-12">
                        <a href="${link.link}" target="_blank">${link.label}</a>
                    </div>
                </div>`)
        } else {
            linkList.html('Chưa có test link cho level này');
        }


    }
    function makeLoadingAnimate() {
        const loadingArea = $('#loading-area');
        loadingArea.find('#loading').show();
        loadingArea.find('input').hide();
    }
    function clearLoadingAnimate() {
        const loadingArea = $('#loading-area');
        loadingArea.find('#loading').hide();
        loadingArea.find('input').show();
    }
</script>