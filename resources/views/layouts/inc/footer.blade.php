<footer class="site-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- About Us-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">درباره ما</h3>
                    <ul>
                        <li><a href="{{ route('login') }}">ورود به حساب کاربری </a></li>
                        <li><a href="#goal_section">هدف ما</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Account / Shipping Info-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">اکانت</h3>
                    <ul>
                        <li><a href="#" style="text-decoration:none">پروفایل شما</a></li>
                        <li><a href="#">لیست آرزوهای شما</a></li>
                        <li><a href="#">دوستان شما</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- About Us-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">سیاست ها</h3>
                    <ul>
                        <li><a href="{{ route('policies.privacy') }}">حفظ حریم خصوصی</a></li>
                        <li><a href="{{ route('policies.term') }}">شرایط استفاده</a></li>
                        <li><a href="{{ route('policies.cookie') }}">ذخیره کوکی</a></li>
                    </ul>
                </section>
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Contact Info-->
                <section class="widget widget-light-skin">
                    <h3 class="widget-title">با ما در ارتباط باش</h3>

                    <p><a class="navi-link-light" href="#">contact@wish.xnor.one</a></p>
                    {{-- <a class="social-button shape-circle sb-facebook sb-light-skin" href="#">
                        <i class="fa-brands fa-instagram"></i></a>
                    <a class="social-button shape-circle sb-twitter sb-light-skin" href="#">
                        <i class="fa-brands fa-google"></i></a>
                    <a class="social-button shape-circle sb-instagram sb-light-skin" href="#">
                        <i class="fa-brands fa-facebook"></i></a> --}}
                </section>
            </div>
        </div>
        <hr class="hr-light mt-2 margin-bottom-2x">

        <!-- Copyright-->
        <p class="footer-copyright"><a href="http://xnor.one/">&copy; تمامی حقوق محفوظ است</a></p>
    </div>
</footer>
