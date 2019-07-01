<!-- footer
================================================== -->
<footer>
    <div class="footer-main">

        <div class="row">

            <div class="col-five tab-full footer-about">

                <h4 class="h05">Hanie English.</h4>

                <div class="">
                    <div class="section-text">
                        <h4></h4>
                        <p>Địa chỉ:  Tầng 6 số nhà 22 ngõ 79/14 Dương Quảng Hàm, Cầu Giấy, Hà Nội</p>
                        <p><i class="fa fa-phone"></i>  Hotline: 0918199264</p>
                        <p><i class="fa fa-envelope"></i> hanie.english.edu@gmail.com</p>
                    </div>
                </div>
            </div> <!-- end footer-about -->

            <div class="col-three tab-full footer-social">

                <h4 class="h05">Theo dõi chúng tôi.</h4>

                <ul class="list-links">
                    <li><a href="https://www.facebook.com/Ngh%E1%BB%87-Thu%E1%BA%ADt-Chinh-Ph%E1%BB%A5c-Ti%E1%BA%BFng-Anh-1839176996210179/">Facebook</a></li>
                    <!--<li><a href="#">Twitter</a></li>-->
                    <!--<li><a href="#">Instagram</a></li>-->
                    <!--<li><a href="#">Behance</a></li>-->
                    <!--<li><a href="#">Dribble</a></li>-->
                </ul>

            </div> <!-- end footer-social -->

            <div class="col-four tab-full footer-subscribe end">

                <h4 class="h05">Nhận thông báo.</h4>

                <p>Điền số điện  để chúng tôi có thể thông báo cho bạn những khóa học quan trọng một cách nhanh nhất.</p>

                <div class="subscribe-form">

                    <form class="group" action="{{ route('landing.store.phone') }}" method="get">
                        @csrf
                        <input type="text" value="" name="name" id="name" placeholder="Tên" required="">
                        <input type="text" value="" name="phone_number" id="phone_number" placeholder="Số điện thoại của bạn" required="">
                        <input type="submit" name="Gửi" id="send_phone">
                    </form>

                </div>

            </div> <!-- end footer-subscribe -->

        </div> <!-- end row -->

    </div> <!-- end footer-main -->

    <div class="footer-bottom">

        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright HaniE 2019.</span>
                    <span>Design by <a href=""></a></span>
                </div>
            </div>

        </div>

    </div> <!-- end footer-bottom -->

    <div id="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
    </div>
</footer>