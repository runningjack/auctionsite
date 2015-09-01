<?php
require_once("inc/init.php");
use \Illuminate\Support\Facades\DB;
?>
@extends("layouts.default")
@section("content")
<div class="space10">&nbsp;</div>
<div class="dg">
    <div class="col-4">
        <div class="beta-banner">
            <img src="<?php echo ASSETS_URL?>/uploads/images/banners/banner2.png" alt="">
            <h2
                class="beta-banner-layer text-right"
                data-animo='{
										"duration" : 1000,
										"delay" : 100,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"top" : [20, 20, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                >Woven</h2>
            <p
                class="beta-banner-layer text-right"
                data-animo='{
										"duration" : 1000,
										"delay" : 400,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"top" : [65, 65, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                > <br /> </p>
            <a
                class="beta-banner-layer beta-btn text-right"
                href="javascript:void(0)"
                data-animo='{
										"duration" : 1000,
										"delay" : 300,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"bottom" : [20, 20, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                >Shop Now</a>
        </div>
    </div>
    <div class="col-4">
        <div class="beta-banner">
            <img src="<?php echo ASSETS_URL?>/uploads/images/banners/banner3.png" alt="">
            <h2
                class="beta-banner-layer text-right"
                data-animo='{
										"duration" : 1000,
										"delay" : 100,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"top" : [20, 20, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                >Syringes</h2>
            <p
                class="beta-banner-layer text-right"
                data-animo='{
										"duration" : 1000,
										"delay" : 400,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"top" : [65, 65, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                > <br /> </p>
            <a
                class="beta-banner-layer beta-btn text-right"
                href="javascript:void(0)"
                data-animo='{
										"duration" : 1000,
										"delay" : 300,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"bottom" : [20, 20, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                >Shop Now</a>
        </div>
    </div>

    <div class="col-4">
        <div class="beta-banner">
            <img src="<?php echo ASSETS_URL?>/uploads/images/banners/banner3.png" alt="">
            <h2
                class="beta-banner-layer text-right"
                data-animo='{
										"duration" : 1000,
										"delay" : 100,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"top" : [20, 20, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                >Syringes</h2>
            <p
                class="beta-banner-layer text-right"
                data-animo='{
										"duration" : 1000,
										"delay" : 400,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"top" : [65, 65, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                > <br /> </p>
            <a
                class="beta-banner-layer beta-btn text-right"
                href="javascript:void(0)"
                data-animo='{
										"duration" : 1000,
										"delay" : 300,
										"easing" : "easeOutSine",
										"template" : {
											"opacity" : [0, 1],
											"bottom" : [20, 20, "px"],
											"right" : [-300, 25, "px"]
										}
									}'
                >Shop Now</a>
        </div>
    </div>
</div>



<div class="space50">&nbsp;</div>
<div class="beta-products-list">
    <h4 class="wow fadeInLeft">Special Products</h4>
    <div class="beta-products-details">
        <p class="pull-left">438 found | <a href="#">View all</a></p>
        <p class="pull-right">
            <span class="sort-by">Sort by </span>
            <select name="sortproducts" class="beta-select-primary">
                <option value="desc">Latest</option>
                <option value="popular">Popular</option>
                <option value="rating">Rating</option>
                <option value="best">Best</option>
            </select>
        </p>
        <div class="clearfix"></div>
    </div>

        <div class="row">
            @if($specialproducts)
            @foreach($specialproducts as $latest)
            <div class="col-sm-3 wow fadeInDown">
                <div class="single-item">
                    <div class="ribbon-wrapper"><div class="ribbon sale">Special</div></div>
                    <div class="single-item-header">

                        <?php
                        if($latest->image != ""){
                            if(public_path()){
                                $source_folder = public_path().'/uploads/images/';
                                $destination_folder = public_path(). '/uploads/images/';
                                $image_info = pathinfo(public_path().'/uploads/images/'.$latest->image);
                            }else{
                                $source_folder = '/home/medicalng/public_html/uploads/images/';
                                $destination_folder = '/home/medicalng/public_html/uploads/images/';
                                $image_info = pathinfo('/home/medicalng/public_html/uploads/images/'.$latest->image);
                            }

                            $image_extension = strtolower($image_info["extension"]); //image extension
                            $image_name_only = strtolower($image_info["filename"]);//file name only, no extension

                            $img2 = \Image::make($source_folder.$latest->image);
                            $img2->resize(262,311);
                            $imgName = $image_name_only."-262x311".".".$image_extension;
                            $img2->save($destination_folder."thumbs/".$imgName);


                            echo "<a href='".url()."/product/details/".$latest->id."'><img src='".url()."/uploads/images/thumbs/".$imgName."' style='width:262px !important; height:311px !important'></a>";
                        }?>
                    </div>
                    <div class="single-item-body">
                        <p class="single-item-title">{{$latest->title}}</p>
                        <p class="single-item-price">
                            <span class="beta-sales-price"> &#8358;{{number_format($latest->price,2,".",",")}}</span>
                            <span class="beta-sales-price"> &#8358;{{number_format($latest->price,2,".",",")}}</span>
                        </p>
                    </div>
                    <div class="single-item-caption">
                        <!--<a class="add-to-cart pull-left" href="javascript:void(0)" pid="{{$latest->id}}"><i class="fa fa-shopping-cart"></i></a>-->
                        <a class="beta-btn primary" href="{{ASSETS_URL}}/product/details/{{$latest->id}}">Details <i class="fa fa-chevron-right"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div> <!-- .beta-products-list -->


<div class="space50">&nbsp;</div>
<div class="beta-products-list">
    <h4 class="wow fadeInLeft">New Products</h4>
    <div class="beta-products-details">


        <div class="clearfix"></div>
    </div>

    <div class="row">
        @if($newproducts)
        @foreach($newproducts as $latest)
        <div class="col-sm-3 wow fadeInDown">
            <div class="single-item">
                <!--<div class="ribbon-wrapper"><div class="ribbon sale">New</div></div>-->
                <div class="single-item-header">

                    <?php
                    if($latest->image != ""){
                        if(public_path()){
                            $source_folder = public_path().'/uploads/images/';
                            $destination_folder = public_path(). '/uploads/images/';
                            $image_info = pathinfo(public_path().'/uploads/images/'.$latest->image);
                        }else{
                            $source_folder = '/home/medicalng/public_html/uploads/images/';
                            $destination_folder = '/home/medicalng/public_html/uploads/images/';
                            $image_info = pathinfo('/home/medicalng/public_html/uploads/images/'.$latest->image);
                        }

                        $image_extension = strtolower($image_info["extension"]); //image extension
                        $image_name_only = strtolower($image_info["filename"]);//file name only, no extension

                        $img2 = \Image::make($source_folder.$latest->image);
                        $img2->resize(262,311);
                        $imgName = $image_name_only."-262x311".".".$image_extension;
                        $img2->save($destination_folder."thumbs/".$imgName);


                        echo "<a href='".url()."/product/details/".$latest->id."'><img src='".url()."/uploads/images/thumbs/".$imgName."' style='width:262px !important; height:311px !important'></a>";
                    }?>
                </div>
                <div class="single-item-body">
                    <p class="single-item-title">{{$latest->title}}</p>
                    <p class="single-item-price">
                        <span class="beta-sales-price">Current Price: &#8358;{{number_format($latest->price,2,".",",")}}</span>
                    </p>
                </div>
                <div class="single-item-caption">
                    <!--<a class="add-to-cart pull-left" href="javascript:void(0)" pid="{{$latest->id}}"><i class="fa fa-shopping-cart"></i></a>-->
                    <a class="beta-btn primary" href="{{ASSETS_URL}}/product/details/{{$latest->id}}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div> <!-- .beta-products-list -->



<div class="space50">&nbsp;</div>
<div class="beta-products-list">
    <h4 class="wow fadeInLeft">Featured Products</h4>
    <div class="beta-products-details">


        <div class="clearfix"></div>
    </div>

    <div class="row">
        @if($latestproducts)
        @foreach($latestproducts as $latest)
        <div class="col-sm-3 wow fadeInDown">
            <div class="single-item">
                <!--<div class="ribbon-wrapper"><div class="ribbon sale">New</div></div>-->
                <div class="single-item-header">

                    <?php
                    if($latest->image != ""){
                        if(public_path()){
                            $source_folder = public_path().'/uploads/images/';
                            $destination_folder = public_path(). '/uploads/images/';
                            $image_info = pathinfo(public_path().'/uploads/images/'.$latest->image);
                        }else{
                            $source_folder = '/home/medicalng/public_html/uploads/images/';
                            $destination_folder = '/home/medicalng/public_html/uploads/images/';
                            $image_info = pathinfo('/home/medicalng/public_html/uploads/images/'.$latest->image);
                        }

                        $image_extension = strtolower($image_info["extension"]); //image extension
                        $image_name_only = strtolower($image_info["filename"]);//file name only, no extension

                        $img2 = \Image::make($source_folder.$latest->image);
                        $img2->resize(262,311);
                        $imgName = $image_name_only."-262x311".".".$image_extension;
                        $img2->save($destination_folder."thumbs/".$imgName);


                        echo "<a href='".url()."/product/details/".$latest->id."'><img src='".url()."/uploads/images/thumbs/".$imgName."' style='width:262px !important; height:311px !important'></a>";
                    }?>
                </div>
                <div class="single-item-body">
                    <p class="single-item-title">{{$latest->title}}</p>
                    <p class="single-item-price">
                        <span class="beta-sales-price"> Current Price: &#8358;{{number_format($latest->price,2,".",",")}}</span>
                    </p>
                </div>
                <div class="single-item-caption">
                    <!--<a class="add-to-cart pull-left" href="javascript:void(0)" pid="{{$latest->id}}"><i class="fa fa-shopping-cart"></i></a>-->
                    <a class="beta-btn primary" href="{{ASSETS_URL}}/product/details/{{$latest->id}}">Details <i class="fa fa-chevron-right"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</div> <!-- .beta-products-list -->




<div class="space50">&nbsp;</div>
<div class="dg">
    <div class="col-4">
        <div class="beta-banner">
            <a href="#"><img class="h164" src="{{url()}}/img/banner9.jpg" alt=""></a>
        </div>
    </div>
    <div class="col-4">
        <div class="beta-banner">
            <a href="#"><img class="h164" src="{{url()}}/img/banner10.jpg" alt=""></a>
        </div>
    </div>
    <div class="col-4">
        <div class="beta-banner">
            <a href="#"><img class="h164" src="{{url()}}/img/banner11.jpg" alt=""></a>
        </div>
    </div>
</div>


@stop
