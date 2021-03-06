<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 3/23/15
 * Time: 1:32 PM
 */
?>

<?php
require_once("inc/init.php");
?>

@extends("layouts.detail")
@section("content")
@if($myproduct)
<div class="row">
    <div class="col-sm-4">
        <?php
            if($myproduct->image != ""){
                if(public_path()){
                    $source_folder      = public_path().'/uploads/images/';
                    $destination_folder = public_path(). '/uploads/images/';
                }else{
                    $source_folder      = '/home/medicalng/public_html/uploads/images/';
                    $destination_folder = '/home/medicalng/public_html/uploads/images/';
                }

                $image_info = pathinfo($source_folder.$myproduct->image);
                $image_extension = strtolower($image_info["extension"]); //image extension
                $image_name_only = strtolower($image_info["filename"]);//file name only, no extension
                
                $imgName = $image_name_only."-262x311".".".$image_extension;
            echo "<img src='".ASSETS_URL."/uploads/images/thumbs/".$imgName."' alt=''>";
        }?>
    </div>
    <div class="col-sm-8">
        <div class="single-item-body">
            <p class="single-item-title"><h4>{{$myproduct->title}}</h4></p>

            <p class="single-item-price">
                @if(isset($price) && $price >0 )
                <span>&#8358;{{number_format($price,2,".",",")}}</span>
                @else
                <span>&#8358;{{number_format($myproduct->price,2,".",",")}}</span>
                @endif

            </p>

        </div>
        <div class="woocommerce-product-rating">
            <div class="star-rating" title="Rated 4.00 out of 5">
                <span style="width:80%"> <strong itemprop="ratingValue" class="rating">4.00</strong> out of 5 </span>
            </div>
            <span class="color-gray">(14)</span>
        </div>
        <div class="clearfix"></div>
        <div class="space20">&nbsp;</div>

        <div class="single-item-desc">
            <p>

                <?php
                $highligt_stream = "";
                if($myproduct->description !=""){
                    $cat =($myproduct->description);
                    // echo $cat;
                    $higlights = explode(" ",$myproduct->description);

                    $z=1;

                    foreach($higlights as $higlight){
                        $highligt_stream .= $higlight." ";
                        $z++;
                        if(count($higlights) > 50){
                            if($z == 50){
                                goto a;
                            }
                        }
                    }
                }else{

                }
                a:100;
                ?>
            {{$highligt_stream}}

            </p>
        </div>
        <div class="space20">&nbsp;</div>

        <p>Available Options:</p>
        <div>
            <table class="shop_table">
                <tr><td>Current Bid</td><td>&#8358;{{number_format($myproduct->price,2,".",",")}}</td></tr>
                <tr><td>Open Price</td><td>&#8358;{{number_format($myproduct->open_price,2,".",",")}}</td></tr>

            </table>

        </div>
        <div class="beta-comp">
            <p>Current Bid <span>{{$myproduct->price}}</span></p>
            <input type="text" class="input">
            <a href="#" class="beta-btn primary">Place Your Bid! </a>
        </div>
    </div>
</div>
@endif
<hr>
<div class="space40">&nbsp;</div>
<div class="woocommerce-tabs">
    <ul class="tabs">
        <li class="active"><a href="#tab-description">Description</a></li>
        <li class=""><a href="#tab-reviews">Reviews <?php echo  isset($reviews) && count($reviews)>0 ? "(".count($reviews).")" :"(0)"  ?></a></li>
    </ul>

    <div class="panel" id="tab-description" style="display: block;">
        <?php
        if($myproduct->description !=""){
            echo $myproduct->description;
        }else{
            echo "";
        }
        ?>
    </div>
    <div class="panel" id="tab-reviews" style="display: none;">
        <div class="row">
            @if($reviews)
                @foreach($reviews as $review)
            <div class="beta-blog beta-blog-b">
                <div class="beta-blog-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="beta-blog-title"><a href="#">{{$review->comment_subject}}</a></h5>
                            <p>By: <a href="#">{{$review->comment_author}}</a> | <a href="#">0 Comments</a> | <a href="#">{{date_format(date_create($review->created_at),"M")}},
                                    {{date_format(date_create($review->created_at),"j")}} {{date_format(date_create($review->created_at),"Y")}}</a> </p>
                        </div>
                    </div>
                </div>

                <div class="row beta-blog-content">
                    <div class="col-12">
                        <div class="beta-blog-b-preview-container-all">
                            <div class="beta-blog-b-preview-container">
                                <span class="beta-blog-type"><i class="fa fa-picture-o"></i></span>
										<span class="beta-blog-date">
											<span class="beta-blog-month">{{date_format(date_create($review->created_at),"M")}}</span>
											<span class="beta-blog-day">{{date_format(date_create($review->created_at),"j")}}</span>
										</span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="beta-blog-b-preview">
                                <p>{{$review->comment_content}}</p>
                            </div>




                        </div>

                    </div>

                </div>
            </div>
                @endforeach
            <div class="space45">&nbsp;</div>
            @endif

        </div>

        <div class="row">
            <div class="col-12">
                <p><h5>Write your own review about this product</h5></p>
                <div class="space20">&nbsp;</div>
                <div class="msg"></div>
                <div class="space20">&nbsp;</div>
                <div class="form-block">
                    <label for="nickname"><strong>Nick Name<span class="pink"> *</span></strong></label>
                    <input type="text" id="nickname" name="nickname" placeholder="Nick Name" required >
                    <input type="hidden" id="prodid" name="prodid" value="{{$myproduct->id}}" >
                </div>

                <div class="form-block">
                    <label for="email"><strong>Email</strong></label>
                    <input type="text" id="email" name="email" placeholder="Email" >
                </div>

                <div class="form-block">
                    <label for="address"><strong>Summary of your review <span class="pink">*</span></strong></label>
                    <input type="text" id="summary" name="summary_review" placeholder="Summary of Review" required >
                </div>


                <div class="form-block">
                    <label for="review"><strong>Review <span class="pink">*</span></strong></label>
                    <textarea id="review" name="review"  required ></textarea>
                </div>
            </div>
            <div class="text-center"><button class="beta-btn primary btn_review">Submit Review <i class="fa fa-chevron-right"></i></button></div>
        </div>
    </div>
</div>


@stop
@section('aside')
  <h3 class="widget-title"><small>More products from this brand</small></h3>
    @if($related)
        <div class="beta-sale beta-lists">
        @foreach($related as $relate)
            <div class="media beta-sales-item">
                <a class="pull-left" href="{{ASSETS_URL}}/product/details/{{$relate->id}}">

                    @if($relate->image != "")
                    @if(public_path())
                    {{--*/$image_info = pathinfo(public_path().'/uploads/images/'.$relate->image)/*--}}
                    {{--*/$image_extension = strtolower($image_info["extension"])/*--}}
                    {{--*/$image_name_only = strtolower($image_info["filename"])/*--}}
                    {{--*/$destination_folder = public_path().'/uploads/images/'/*--}}
                    @else
                    {{--*/$image_info = pathinfo('/home/medicalng/public_html/uploads/images/'.$relate->image)/*--}}
                    {{--*/$image_extension = strtolower($image_info["extension"])/*--}}
                    {{--*/$image_name_only = strtolower($image_info["filename"])/*--}}
                    {{--*/$destination_folder = '/home/medicalng/public_html/uploads/images/'/*--}}
                    @endif

                    {{--*/$imgName = $image_name_only."-50x50".".".$image_extension/*--}}

                {{"<img alt='' src='".ASSETS_URL."/uploads/images/thumbs/".$imgName."'>"}}
                    @endif


                </a>
                <div class="media-body">
                    {{$relate->title}}
                    <br>
                    <span class="beta-sales-price">&#8358;{{number_format($relate->price,2,".",",")}}</span>
                </div>
            </div>
        @endforeach
        </div>
    @endif
@stop