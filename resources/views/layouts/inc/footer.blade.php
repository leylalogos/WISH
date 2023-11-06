<footer class="site-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <!-- About Us-->
                <section class="widget widget-links widget-light-skin">
                    <h3 class="widget-title">درباره ما</h3>
                    <ul>
                        <li><a href="{{ route('login') }}">ورود به حساب کاربری </a></li>
                        <li><a href="#">هدف ما</a></li>
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
                    <h3 class="widget-title"> حریم خصوصی</h3>
                    <ul>
                        <li><a href="{{ route('policies.privacy') }}">حفظ حریم خصوصی</a></li>
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
        <div class="row">
            <div class="col-md-7 padding-bottom-1x"></div>
            <div class="col-md-5 padding-bottom-1x">
                <div class="margin-top-1x hidden-md-up"></div>
                <!--Subscription-->
                <form class="subscribe-form" action="#" method="post" target="_blank" novalidate="">
                    <div class="clearfix">
                        <div class="input-group input-light">
                            <input class="form-control" type="email" name="EMAIL"
                                placeholder="ایمیل وارد کنید"><span class="input-group-addon"><i
                                    class="icon-mail"></i></span>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">عضویت</button>
                    </div><span class="form-text text-sm text-white opacity-50">
                        برای با خبر شدن از تمامی اخبار و آخرین آپدیت ها عضو شو</span>
                </form>
            </div>
        </div>
        <!-- Copyright-->
        <p class="footer-copyright"><a>&copy; تمامی حقوق محفوظ است</a></p>
    </div>
</footer>
