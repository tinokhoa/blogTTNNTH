<!DOCTYPE html>
<html lang="en">
@include('.layout.header')

<body>

@include('.layout.nav')
<!-- END nav -->

<!-- END nav -->
@foreach($chitietbds as $item)
    <section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('{{$item->hinhanh}}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread">{{$item->ten_bds}}</h1>
                    <p class="breadcrumbs"><span class="mr-2">
                            <a href="{{\Illuminate\Support\Facades\URL::to('/')}}">Trang chủ
                                <i class="ion-ios-arrow-forward"></i></a></span> <span>Chi tiết sản phẩm<i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-property-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="property-details">
                        @php $files = explode(',',$item->anhchitiet) @endphp
                        @foreach($files as $img => $val)
                            <div class="img rounded" style="background-image: url({{$val}});"></div>
                        @endforeach
                        <div class="text">
                            <h2>{{$item->tieu_de}}</h2>
                            <span class="subheading">{{$item->ten_bds}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex">
                            <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Tổng quan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Đánh giá</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Diện tích : {{$item->dientich}} m2</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Phòng ngủ : {{$item->phongngu}} phòng</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Nhà vệ sinh : {{$item->nhavesinh}} phòng</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Số tầng : {{$item->sotang}} tầng</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Nhà để xe : {{$item->ham_dexe}} cái</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Diện tích nhà ở : {{$item->dientich_nha}} m2</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Địa chỉ : {{$item->diadiem}}</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Diện tích đất : {{$item->dientich_dat}} m2</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Giá: {{$item->gia}} VND</li>
                                            <li class="check"><span class="ion-ios-checkmark-circle"></span>Giá giảm : {{$item->gia_dukien}} VND </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <p> {{$item->noidung}}</p>
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="head">23 Đánh giá</h3>
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url({{url('')}}/assets/images/person_1.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">Trần Thông</span>
                                                    <span class="text-right">17 October 2019</span>
                                                </h4>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                            </div>
                                        </div>
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(js/images/person_2.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">Jacob Webb</span>
                                                    <span class="text-right">17 October 2019</span>
                                                </h4>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                            </div>
                                        </div>
                                        <div class="review d-flex">
                                            <div class="user-img" style="background-image: url(js/images/person_3.jpg)"></div>
                                            <div class="desc">
                                                <h4>
                                                    <span class="text-left">Jacob Webb</span>
                                                    <span class="text-right">17 October 2019</span>
                                                </h4>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
                                                    <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                </p>
                                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="rating-wrap">
                                            <h3 class="head">Give a Review</h3>
                                            <div class="wrap">
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
                                                    <span>20 Reviews</span>
                                                </p>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
                                                    <span>10 Reviews</span>
                                                </p>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
                                                    <span>5 Reviews</span>
                                                </p>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
                                                    <span>0 Reviews</span>
                                                </p>
                                                <p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
                                                    <span>0 Reviews</span>
                                                </p>
                                            </div>
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
@endforeach

@include('.layout.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@include('.layout.script')

</body>
</html>
