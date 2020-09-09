<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            @foreach($banner as $ba)
            <li style="background-image: url({{\App\Library\Files::media( $ba->image )}});">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
{{--                                    <h1 class="head-1">Sale</h1>--}}
                                    <h4 style="text-align: center" class="head-3">{!! $ba->title !!}</h4>
                                    <p class="category"><span>{!! $ba->content !!}</span></p>
                                    <p><a href="#" class="btn btn-primary">Kết nối với shop</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
