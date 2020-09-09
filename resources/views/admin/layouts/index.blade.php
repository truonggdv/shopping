<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LeooShop - @yield('title')</title>
    <link href="{{url('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/styles.css')}}" rel="stylesheet">
    <script src="{{url('backend/js/lumino.glyphs.js')}}"></script>
    <script src="{{url('backend/js/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
          integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('dashboard.index')}}"><span>LEOO </span>SHOP</a>
            <ul class="user-menu">
                @guest
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a style="color: #000; margin-left:10px;" class="dropdown-item text-secondary" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
    <!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>Trang chủ</a></li>
        <li><a href="{{route('user.index')}}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý thành viên</a></li>
        <li><a href="{{route('categories.index')}}"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>Quản lý danh mục</a></li>
        <li><a href="{{route('pay.index')}}"><svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>Đơn hàng</a></li>
        <li><a href="{{route('banner.index')}}"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg>Quản lí banner</a></li>
        <li><a href="{{route('product.index')}}"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg>Quản lí sản phẩm</a></li>
        <li><a href="{{route('background.index')}}"><svg class="glyph stroked chain"><use xlink:href="#stroked-chain"/></svg> Quản lý ảnh nền</a></li>
        <li><a href="{{route('introduce.index')}}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình giới thiệu</a></li>
        <li><a href="{{route('role.index')}}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấp quyền</a></li>
        <li><a href="{{route('permission.index')}}"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Quyền</a></li>
    </ul>
    <script>
    $(document).ready(function(){
        jQuery(function () {
            var page = window.location.href;

            var ele=$('.menu a[href="' + page + '"]');
            ele.addClass('active');
            ele.parents('li').addClass('active');
        });
    },false)
    </script>
</div>
<!--/.sidebar-->


@yield('main')

<script src="{{url('backend/js/bootstrap.min.js')}}"></script>
<script src="{{url('backend/js/chart.min.js')}}"></script>
<script src="{{url('backend/js/chart-data.js')}}"></script>
<script src="{{url('backend/js/bootstrap-table.js')}}"></script>
</body>

</html>
