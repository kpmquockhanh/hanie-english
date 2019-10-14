<footer class="footer-section bg-white" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>About HANIE ENGLISH.</h3>
                <p>Địa chỉ: Tầng 6 số nhà 22 ngõ 79/14 Dương Quảng Hàm, Cầu Giấy, Hà Nội</p>
                <p><span class="icon icon-phone"></span> Hotline: 0918199264</p>
                <p><span class="icon icon-add_box"></span> hanie.english.edu@gmail.com</p>
            </div>

            <div class="col-md-3 ml-auto">
                <h3>THEO DÕI CHÚNG TÔI</h3>
                <ul class="list-unstyled footer-links">
                    <li>
                        <a href="https://www.facebook.com/Ngh%E1%BB%87-Thu%E1%BA%ADt-Chinh-Ph%E1%BB%A5c-Ti%E1%BA%BFng-Anh-1839176996210179/">Facebook</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4">
                <h3>Nhận thông báo</h3>
                <p>Điền số điện để chúng tôi có thể thông báo cho bạn những khóa học quan trọng một
                    cách nhanh nhất.</p>
                <form action="{{ route('landing.store.phone') }}" class="footer-subscribe">
                    @csrf
                    <div class="d-flex mb-5 flex-column">
                        <input type="text" class="form-control rounded-0" placeholder="Tên của bạn" name="name"
                               autocomplete="off">
                        <input type="text" class="form-control rounded-0" placeholder="Số điện thoại"
                               name="phone_number" autocomplete="off">
                        <input type="submit" class="btn btn-primary rounded-0" value="Đăng kí">
                    </div>
                </form>
            </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        Hanie English.
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>