<!DOCTYPE html>
<html lang="en">
@include('.layout.header')
<body>
@include('.layout.nav')
<div class="hero-wrap" style="background-image: url('images/bg_ctump.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="col-lg-9 col-md-5 ftco-animate d-flex align-items-end">
                <div class="text text-center w-101">
                    <h1 class="mb-4" color="white">CTUMP<br>Trung tâm Ngoại Ngữ & Tin học</h1>
{{--                    <p><a href="#" class="btn btn-primary py-3 px-4">Tìm kiếm </a></p>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="mouse">
        <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
    </div>
</div>

<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-12">
                <div class="form-group">
                    <h2>Nhập từ khóa để tìm để tìm kiếm</h2>
                    <input type="text" name="country" id="country" placeholder="Enter country name" class="form-control">
                </div>
                <div id="country_list"></div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#country').on('keyup',function() {
            var query = $(this).val();
            $.ajax({

                url:"{{ route('search') }}",

                type:"GET",

                data:{'country':query},

                success:function (data) {

                    $('#country_list').html(data);
                }
            })
            // end of ajax call
        });


        $(document).on('click', 'li', function(){

            var value = $(this).text();
            $('#country').val(value);
            $('#country_list').html("");
        });
    });
</script>
<section class="ftco-section goto-here">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Khóa mới</span>
                <h2 class="mb-2"></h2>
            </div>
        </div>
        <div class="row">
            @foreach($batdongsan as $item)
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center"
                             style="background-image: url({{$item->hinhanh}});">
                            <a href="{{route('chitiet',$item->id)}}"
                               class="icon d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                            <div class="list-agent d-flex align-items-center">
                                <a href="#" class="agent-info d-flex align-items-center">
                                    <div class="img-2 rounded-circle"
                                         style="background-image: url(images/person_1.jpg);"></div>
                                    <h3 class="mb-0 ml-2">Ben Ford</h3>
                                </a>
                                <div class="tooltip-wrap d-flex">
                                    <a href="#" class="icon-2 d-flex align-items-center justify-content-center"
                                       data-toggle="tooltip" data-placement="top" title="Bookmark">
                                        <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                                    </a>
                                    <a href="#" class="icon-2 d-flex align-items-center justify-content-center"
                                       data-toggle="tooltip" data-placement="top" title="Compare">
                                        <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <p class="price mb-3"><span class="old-price">{{$item->gia}} VND</span><span
                                    class="orig-price">{{$item->dientich}}<small> m2</small></span></p>
                            <h3 class="mb-0"><a href="{{route('chitiet',$item->id)}}">{{$item->ten_bds}}</a></h3>
                            <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>2854 Meadow View Drive, Hartford, USA</span>
                            <ul class="property_list">
                                <li><span class="flaticon-bed"></span>3</li>
                                <li><span class="flaticon-bathtub"></span>2</li>
                                <li><span class="flaticon-floor-plan"></span>{{$item->dientich}}/m2</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section ftco-fullwidth">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Dịch vụ</span>
                <h2 class="mb-2">Tại sao phải chọn chúng tôi ?</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="row d-md-flex text-wrapper align-items-stretch">
            <div class="one-half mb-md-0 mb-4 img d-flex align-self-stretch"
                 style="background-image: url('images/about.jpg');"></div>
            <div class="one-half half-text d-flex justify-content-end align-items-center">
                <div class="text-inner pl-md-5">
                    <div class="row d-flex">
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span
                                        class="flaticon-piggy-bank"></span></div>
                                <div class="media-body pl-4">
                                    <h3>No Downpayment</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span
                                        class="flaticon-wallet"></span></div>
                                <div class="media-body pl-4">
                                    <h3>All Cash Offer</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span
                                        class="flaticon-file"></span></div>
                                <div class="media-body pl-4">
                                    <h3>Experts in Your Corner</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services-wrap d-flex">
                                <div class="icon d-flex justify-content-center align-items-center"><span
                                        class="flaticon-locked"></span></div>
                                <div class="media-body pl-4">
                                    <h3>Locked in Pricing</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter ftco-section img" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="305">0</strong>
                        <span>Khóa học</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="1090">0</strong>
                        <span>Tổng <br> số Khóa đã đang mở</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="209">0</strong>
                        <span>Khóa học <br>đẫ hoàn thành!</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <strong class="number" data-number="67">0</strong>
                        <span>Tổng <br>chi nhánh</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Tìm kiếm bất động sản</span>
                <h2 class="mb-2">Tất cả các dự án</h2>
            </div>
        </div>

        <div class="row">
            @foreach($duan as $item)
                <div class="col-md-4">
                    <div class="listing-wrap img rounded d-flex align-items-end"
                         style="background-image: url({{$item->anh_bia}});">
                        <div class="location">
                            <span class="rounded">{{$item->ten_duan}}</span>
                        </div>
                        <div class="text">
                            <h3><a href="#">100 Property Listing</a></h3>
                            <a href="#" class="btn-link">See All Listing <span
                                    class="ion-ios-arrow-round-forward"></span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Đánh giá</span>
                <h2 class="mb-3">Phản hồi từ khách hàng</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-agent">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Seller</span>
                <h2 class="mb-4">Our Seller</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="images/team-1.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">Ben Ford</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span
                                class="details">43 Properties</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="images/team-2.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">John Cooper</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span
                                class="details">28 Properties</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="images/team-3.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">Janice Clinton</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span
                                class="details">30 Properties</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ftco-animate">
                <div class="agent">
                    <div class="img">
                        <img src="images/team-4.jpg" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3><a href="properties.html">Eunice Henceford</a></h3>
                        <p class="h-info"><span class="ion-ios-filing icon"></span> <span
                                class="details">25 Properties</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Blog</span>
                <h2>Recent Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text">
                        <a href="blog-single.html" class="block-20 img"
                           style="background-image: url('images/image_1.jpg');">
                        </a>
                        <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">October 17, 2019</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text">
                        <a href="blog-single.html" class="block-20 img"
                           style="background-image: url('images/image_2.jpg');">
                        </a>
                        <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">October 17, 2019</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text">
                        <a href="blog-single.html" class="block-20 img"
                           style="background-image: url('images/image_3.jpg');">
                        </a>
                        <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">October 17, 2019</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry justify-content-end">
                    <div class="text">
                        <a href="blog-single.html" class="block-20 img"
                           style="background-image: url('images/image_4.jpg');">
                        </a>
                        <h3 class="heading"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">October 17, 2019</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('.layout.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>
@include('.layout.script')
</body>
</html>
