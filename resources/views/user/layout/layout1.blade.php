<!DOCTYPE html>
<html>
    <head>
        <title>Petlove</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

        <script src="{{ asset('frontend/script.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    </head>
    <body>
        <!--Search Bar For Desktop-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="margin-top: 120px;">
                <input class="form-control" placeholder="Nhập vào sản phẩm bạn cần tìm">
              </div>
            </div>
        </div>
        <!--End Search Bar For Desktop-->
        <div class="level2" id="categoriesExpand" style="margin-top: 55px;">
            <div class="container">
                <div class="dropdown">
                    @foreach ($categories as $category)
                        @if ($category->ParentID == 0)
                            <h5 class="level2-root">{{$category->Name}}</h5>
                        @endif
                    @endforeach
                </div>
            </div> 
        </div>

        <!--Navbar-->
        @include('user.partials.navbar')
        <!--EndNavbar-->

        <!--Content-->
        @yield('content')
        <!--EndContent-->

    </body>

</html>