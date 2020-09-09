<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="/"><img src="images/logo.png" alt="" style="width: 300px;height: 50px;"></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="/">Trang chủ</a></li>
                        <li class="has-dropdown">
                            <a href="shop.html">Cửa hàng</a>
                            <ul class="dropdown">
                                <li><a href="{{url('cart/show')}}">Giỏ hàng</a></li>
                                <li><a href="{{url('cart/checkout')}}">Thanh toán</a></li>

                            </ul>
                        </li>
                        <li><a href="{{url('thong-tin/lich-su')}}">Giới thiệu</a></li>
                        <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
                        <li><a href="{{url('cart/show')}}"><i class="icon-shopping-cart"></i> Giỏ hàng [{{Cart::count()}}]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
