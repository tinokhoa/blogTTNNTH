<!DOCTYPE html>
<html lang="en">
@include('.layout.header')
<body>

@include('.layout.nav')
<!-- END nav -->

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url('images/bg_ctump2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="overlay-2"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                <h1 class="mb-3 bread">Properties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{\Illuminate\Support\Facades\URL::to('/')}}">Trang chủ <i class="ion-ios-arrow-forward"></i></a></span> <span>Bất động sản<i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section goto-here">
    <div class="container">
        <div class="row">
            @foreach($batdongsan as $item)
                <div class="col-md-4">
                    <div class="property-wrap ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{$item->hinhanh}});">
                            <a href="properties-single.html" class="icon d-flex align-items-center justify-content-center btn-custom">
                                <span class="ion-ios-link"></span>
                            </a>
                            <div class="list-agent d-flex align-items-center">
                                <a href="#" class="agent-info d-flex align-items-center">
                                    <div class="img-2 rounded-circle" style="background-image: url(images/person_1.jpg);"></div>
                                    <h3 class="mb-0 ml-2">Ben Ford</h3>
                                </a>
                                <div class="tooltip-wrap d-flex">
                                    <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                        <span class="ion-ios-heart"><i class="sr-only">Bookmark</i></span>
                                    </a>
                                    <a href="#" class="icon-2 d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="top" title="Compare">
                                        <span class="ion-ios-eye"><i class="sr-only">Compare</i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text">
                            <p class="price mb-3"><span class="orig-price">{{$item->gia}}VND</span></p>
                            <h3 class="mb-0"><a href="{{route('chitiet',$item->id)}}">{{$item->ten_bds}}</a></h3>
                            @php $chitiet=\App\Models\ChitietBatdongsan::all()->where('id_bds',$item->id) @endphp
                            @foreach($chitiet as $item2)
                            <span class="location d-inline-block mb-3"><i class="ion-ios-pin mr-2"></i>{{$item2->diadiem}}</span>
                            <ul class="property_list">
                                <li><span class="flaticon-bed"></span>{{$item2->phongngu}}</li>
                                <li><span class="flaticon-bathtub"></span>{{$item2->nhavesinh}}</li>
                                <li><span class="flaticon-floor-plan"></span>{{$item2->dientich_nha}}</li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@include('.layout.footer')



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@include('.layout.script')

</body>
</html>
