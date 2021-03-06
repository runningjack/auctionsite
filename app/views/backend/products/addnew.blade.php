<?php
/**
 * Created by PhpStorm.
 * User: Amedora
 * Date: 3/12/15
 * Time: 10:11 AM
 */

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Add New Product";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["catalogue"]['sub']['product']['sub']['addnew']["active"] = false;
include("inc/nav.php");

?>
    <style>
        #mySearchContainer, #mySearchContainer2{
            z-index:5000 !important;
            width:100%;
            background-color:#fff;
            position:absolute;
            display:none;
            box-shadow: 0 0 3px #666;
            -moz-box-shadow: 0 0 3px #666;
            -webkit-box-shadow: 0 0 3px #666;

        }
        #mySearchContainer2, #mySearchContainer{
            height:200px;
            width: 350px;
            overflow:scroll
        }
        #mySearchContainer ul, #mySearchContainer2 ul{
            list-style:none;
            list-style-image:none;
            margin:0;
            padding:0;

        }
        #mySearchContainer ul li, #mySearchContainer2 ul li{
            float:left;
            color:#666666;
            padding: 5px;
            width: 100%;
            border-bottom-width: thin;
            border-bottom-style: dotted;
            border-bottom-color: #999;
        }
        #mySearchContainer ul li h3, #mySearchContainer2 ul li h3{
            font-size:11px;
        }
        .hover{
            background-color:#01A5E1;
        }

    </style>
    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- MAIN PANEL -->
    <div id="main" role="main" xmlns="http://www.w3.org/1999/html">
        <?php
        $breadcrumbs["Misc"] = "";
        include("inc/ribbon.php");
        ?>
        <!-- MAIN CONTENT -->
        <div id="content">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-code"></i>{{$p_title}}<span>> {{$subtitle}}</span></h1>
                </div>
            </div>
            <section>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <div class="text-left">
                        {{HTML::decode(HTML::linkRoute('prodindex','<span class="btn-label"><i class="glyphicon glyphicon-back"></i> Back to Listing'))}}
                    </div>
                </div>
            </section>
            {{Form::open(array('action'=>array('Backend\CatalogueController@postProductAddNew', ""), 'method'=>'POST', 'class'=>'form-horizontal', 'files'=>true)) }}
            <div class="row">
                <div class="col-sm-9">
                    <div class="jarviswidget jarviswidget-color-darken jarviswidget-sortable" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" role="widget" style="">
                        <header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus"></i></a>  </div>
                            <span class="widget-icon"> <i class="fa fa-arrows-v"></i> </span>
                            <h2 class="font-md"><strong>Set </strong> <i>Content</i></h2>

                            <!--<span class="jarviswidget-loader" style="display: none;"><i class="fa fa-refresh fa-spin"></i></span>-->
                        </header>
                        <div role="content" style="display: block;">
                            <div class="jarviswidget-editbox">
                            </div>
                            <div class="widget-body">
                                @if(Session::has('error_message'))
                                <div class="alert alert-danger fade in">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <i class="fa-fw fa fa-check"></i>{{Session::get('error_message')}}
                                </div>
                                @endif
                                @if(Session::has('success_message'))
                                <div class="alert alert-success fade in">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <i class="fa-fw fa fa-check"></i>{{Session::get('success_message')}}
                                </div>
                                @endif



                                @if ( ! empty( $errors ) )
                                @foreach ( $errors->all() as $error )
                                <div class="alert alert-danger fade in">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <i class="fa-fw fa fa-times"></i>{{$error}}
                                </div>
                                @endforeach
                                @endif


                                <ul id="myTab1" class="nav nav-tabs bordered">
                                    <li class="active">
                                        <a href="#s1" data-toggle="tab">General</a>
                                    </li>
                                    <li class="">
                                        <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-lg fa-gear"></i>Data</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#s3" data-toggle="tab" >Links </a>
                                    </li>
                                    <li class="">
                                        <a href="#s4" data-toggle="tab" >Options </a>
                                    </li>
                                </ul>
                                <div id="myTabContent1" class="tab-content padding-10">
                                    <div class="tab-pane fade in active" id="s1">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Product Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="New Category Title" id="title" name="title" type="text" required="required" value="{{\Input::old('title')}}" autocomplete="off">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea id="description" name="description" class="form-control">{{\Input::old('description')}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Meta Title</label>
                                            <div class="col-md-10">
                                                <textarea id="meta_title" name="meta_title" class="form-control" placeholder="Title" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Meta Keyword</label>
                                            <div class="col-md-10">
                                                <textarea id="meta_keyword" name="meta_keyword" class="form-control" placeholder="Keyword" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Meta Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" placeholder="Description" rows="4" name="meta_description" id="meta_description"></textarea>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="tab-pane fade" id="s2">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Model</label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="model" id="model" name="model" type="text" value="{{\Input::old('model')}}" autocomplete="off">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">SKU <small>Stock Keeping Unit</small></label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="Satock keeping unit" id="suk" name="suk" type="text" value="{{\Input::old('suk')}}" autocomplete="off">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Buying Price<small></small></label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="Buying Price" id="price" name="price" type="text" value="{{\Input::old('price')}}" autocomplete="off">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Opening Price<small></small></label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="Opening Price" id="open_price" name="open_price" type="text" value="{{\Input::old('open_price')}}" autocomplete="off">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Lowest Price to Accept<small></small></label>
                                            <div class="col-md-8">
                                                <input type="hidden" name="oldimage">
                                                <input class="form-control" placeholder="Lowest Price to Accept" id="lowest_price" name="lowest_price" type="text" value="{{\Input::old('lowest_price')}}" autocomplete="off">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Increament Value<small></small></label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="Increament Value" id="inc_value" name="inc_value" type="text" value="{{\Input::old('inc_value')}}" autocomplete="off">

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Date<small></small></label>
                                            <div class="col-md-4">

                                                <div class="input-group">
                                                    <input placeholder="End Date" id="end_date" name="end_date" type="date" value="{{\Input::old('end_date')}}" placeholder="Select a date" class="form-control datepicker hasDatepicker" data-dateformat="dd/mm/yy" >
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <!--<input class="form-control" placeholder="End Date" id="end_date" name="end_date" type="text" value="{{\Input::old('end_date')}}" autocomplete="off">-->

                                            </div>
                                            <div class="col-md-4">

                                                <div class="input-group">
                                                    <input class="form-control" placeholder="Time" id="end_time" name="end_time" type="text" value="{{\Input::old('end_time')}}" autocomplete="off">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Quantity<small></small></label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="" id="quantity" name="quantity" type="text" value="{{\Input::old('quantity')}}" autocomplete="off">

                                            </div>



                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">MO <small>Minimun order level, force reorder when stock is low</small></label>
                                            <div class="col-md-8">
                                                <input class="form-control" placeholder="" id="minimum" name="minimum" type="text" value="{{\Input::old('minimum')}}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="s3">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Category</label>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="Enter product title" id="titles" name="parent_name" type="text"  value="{{\Input::old('parent_name')}}" autocomplete="off">
                                                <input type="hidden" id="clientid" name="parent_id" class="six" value="{{\Input::old('parent_id')}}"  />
                                                <div id="mySearchContainer2" style="position: absolute;">
                                                    <div id="lcpsearchinner"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Category Listing</label>
                                            <div class="col-md-10">
                                                <textarea id="cat" name="cat" rows="4" class="form-control">{{\Input::old('description')}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Brand</label>
                                            <div class="col-md-10">
                                            <select class="form-control" id="brand_id" name="brand_id">
                                                <option value="">--SELECT PARENT PAGE--</option>
                                                @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->title}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="s4">
                                        <div class="tabs-left">
                                            <ul class="nav nav-tabs tabs-left" id="demo-pill-nav">

                                    <span><label class="input">
                                            <input type="text" list="list" id="option">
                                            <datalist id="list">
                                                @if($options)
                                                @foreach($options as $option)
                                                <option value="{{$option->title}}">{{$option->title}}</option>
                                                @endforeach
                                                @endif
                                            </datalist> </label>&nbsp;<img src="<?php echo ASSETS_URL ?>/img/add.png" alt="Add Option" title="Add Option"></span>

                                            </ul>
                                            <div class="tab-content" id="option-tab-content">

                                            </div>
                                        </div>
                                        <br clear="all">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="jarviswidget jarviswidget-sortable" id="wid-id-12" data-widget-load="ajax/demowidget.php" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" role="widget">

                        <header role="heading" class=""><div class="jarviswidget-ctrls" role="menu"><a href="javascript:void(0);" class="button-icon jarviswidget-refresh-btn" data-loading-text="&nbsp;&nbsp;Loading...&nbsp;" rel="tooltip" title="" data-placement="bottom" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>     </div>
                            <h2><strong>Publish &amp;</strong> <i>Page Sttings</i></h2>

                            <span class="jarviswidget-loader" style="display: none;"><!--<i class="fa fa-refresh fa-spin"></i></span>--></header>

                        <!-- widget div-->
                        <div role="content" class="">
                            <!-- widget content -->
                            <div class="widget-body">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-cog"></i>Save &amp; Publish</button>
                                        <!--<a class="btn btn-primary" href="javascript:void(0);"><i class="fa fa-cog"></i> Save &amp; Publish</a>-->
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-12" style="margin: 0; padding: 0">
                                            <div id="imgg" style="background-color: #c3c3c3; padding: 10px; text-align: center">
                                                <i class="fa fa-camera fa-5x"></i>
                                            </div>
                                            <a class="inline2" href="#inline_content2" >Browse</a>
                                            <input class="form-control" id="sort_order" name="sort_order" placeholder="Sort Order" type="text">
                                            <input type="hidden" id="image" name="image" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="checkbox-inline">
                                                <input id="view_status" name="view_status" value="visible" class="checkbox style-0" type="checkbox" checked>
                                                <span>View Status</span><span class=""><small><i> Check to indicate whether product is active and unchecked if you want to deactivate product</i></small></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="checkbox-inline">
                                                <input id="tag" name="tag" value="Special" class="checkbox style-0" type="checkbox">
                                                <span>Special</span><span class=""><small><i>Check to tag product as special.</i></small></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
        </div>
    </div>
    </form>
    </div>
    <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN PANEL -->
    <!-- ==========================CONTENT ENDS HERE ========================== -->
    <!-- PAGE FOOTER -->
<?php
// include page footer
include("inc/footer.php");
?>
    <!-- END PAGE FOOTER -->

<?php
//include required scripts
include("inc/scripts.php");
\Session::flush();
?>
    <div style='display:none'>
        <div id='inline_content2' style='padding:10px; background:#fff;'>

            <ul id="myTab2" class="nav nav-tabs bordered">
                <li class="active">
                    <a href="#v1" data-toggle="tab"><i class="fa fa-fw fa-lg fa-upload"></i>Upload File</a>
                </li>
                <li>
                    <a href="#v2" data-toggle="tab"><i class="fa fa-fw fa-lg fa-camera"></i>Images</a>
                </li>
            </ul>
            <div id="myTabContent2" class="tab-content padding-10">
                <div class="tab-pane fade active" id="v1">
                    {{Form::open(array('action'=>array('Backend\CatalogueController@postProductAddNew', ""), 'method'=>'post', 'class'=>'form-horizontal', 'files'=>true,"onSubmit"=>"return false","enctype"=>"multipart/form-data","id"=>"MyUploadForm")) }}
                    <input name="image_file" id="imageInput" type="file" />
                    <input type="submit"  id="submit-btn" value="Upload" />
                    <img src="<?php echo ASSETS_URL ?>/img/loading.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
                    </form>
                    <div id="progressbox" style="display:none;"><div id="progressbar"></div><div id="statustxt">0%</div></div>
                    <div id="output">

                    </div>
                </div>
                <div class="tab-pane fade" id="v2">
                    <div id="mmd">
                        <h3>Images</h3>
                        <?php
                        //Open images directory
                        $dir = opendir("./uploads/images/");
$filelist = array();
                        //List files in images directoryb
                        while (($file = readdir($dir)) !== false) {
                            if(substr( $file, -3 ) == "jpg" || substr( $file, -3 ) == "png" || substr( $file, -3 ) == "JPG" ) {
                                $filelist[] = $file;

                            }
                        }
                        closedir($dir);
                    if(count($filelist) >0){
                        sort($filelist);
                        echo "<ul class='imglist'>";
                        for($i=0; $i<count($filelist); $i++) {
                            echo "<li><label><input class='form-control radio radimg' type='radio' id='input$i' name='inpute' value='$filelist[$i]'><img
                                  src='".ASSETS_URL."/uploads/images/".$filelist[$i] ."' width='100' height='100'></label></li>";
                        }
                        echo "</ul>";
                    }
                        ?>
                    </div>
                    <br clear="all">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <p>&nbsp;</p>

                            <a href="#" class="btn btn-img btn-primary">Set As Setting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE RELATED PLUGIN(S)

<script src="<?php echo ASSETS_URL; ?>/js/plugin/YOURJS.js"></script>-->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/ckeditor.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/jquery.form.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/colorbox/jquery.colorbox.js"></script>

    <script src="<?php echo ASSETS_URL; ?>/js/plugin/maxlength/bootstrap-maxlength.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/clockpicker/clockpicker.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/noUiSlider/jquery.nouislider.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/ion-slider/ion.rangeSlider.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/knob/jquery.knob.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/x-editable/moment.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/x-editable/jquery.mockjax.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/x-editable/x-editable.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/typeahead/typeahead.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/typeahead/typeaheadjs.min.js"></script>

    <script>

        $(document).ready(function() {
            $(".select2-results li div.select2-result-label").each(function(){
                $(this).click(function(){
                    console.log($(this).val())
                })
            })
            $('#end_time').timepicker();

            $("#end_date" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1920:2010',
                dateFormat : 'dd-mm-yy',
                defaultDate: new Date(1985, 00, 01)
            });
            CKEDITOR.replace( 'description',
                {
                    height: '250px', startupFocus : true,
                    filebrowserBrowseUrl :'<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserImageBrowseUrl : '<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/browser/default/browser.html?Type=Image&amp;Connector=<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserFlashBrowseUrl :'<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/browser/default/browser.html?Type=Flash&amp;Connector=<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserUploadUrl  :'<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                    filebrowserImageUploadUrl : '<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                    filebrowserFlashUploadUrl : '<?php echo ASSETS_URL; ?>/js/plugin/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                }
            );
            // PAGE RELATED SCRIPTS
            var mcat ="";
            $("#titles").keyup(function(){
                //alert("allgood")
                var input= $("#titles");
                $("#mySearchContainer2").slideDown(200);
                $("#mySearchContainer2").html("<div style='width:150px; margin:25px auto;'>Loading Content...  <img src='<?php echo  ASSETS_URL ?>/img/loading.gif'   height='20' /></div>");

                if(input.val() !="" ){
                    $.ajax({
                        type:"get",
                        url:"addnew",
                        data:"input="+input.val(),
                        success: function(outpt){
                            //console.log(outpt)
                            if(outpt.length > 6){
                                $("#mySearchContainer2").html(outpt);

                                $("#mySearchContainer2 ul li").mouseover(function(){
                                    $("#mySearchContainer2 ul li").removeClass("hover");
                                    $(this).addClass("hover");

                                })

                                $("#mySearchContainer2 ul li").each(function(){
                                    $(this).on("mousedown",function(){
                                        //$("#mySearchContainer div.sch").each(function(){
                                        var searchdata = $(this).find("div.sch").html();
                                        var hidfid = $(this).find("div.divvid").attr("vid");
                                        var dress = $(this).find("div.divvid").attr("dress");
                                        $("#clientid").val(hidfid);
                                        mcat += searchdata+","
$("#cat").html(mcat);
                                        $("#titles").val(searchdata);
                                        $("#dress").html(dress)
                                        $("#mySearchContainer2").slideUp(200);
                                        //});
                                    })
                                })

                            }else{
                                $("#mySearchContainer2").slideUp(200);
                            }}
                    })
                }else{
                    $("#mySearchContainer2").slideUp(200);
                }

            });


            $("#titles").on("blur",function(){

            })

            $("#option").on("blur",function(e){
                $("#demo-pill-nav li.mq").removeClass("active")
                $("div.tab-content div.mq").removeClass("active")

                var q = $("#demo-pill-nav li").size()

                var nq = q+1;
                var li_html ='<li class="mq active">'+
                    '<a href="#tab-r'+q+'" data-toggle="tab">'+$(this).val()+'</a>'+
                    '</li>'
                var div_html ='<div class="tab-pane mq active" id="tab-r'+q+'"><div class="row"><div class="col-sm-10 col-lg-10 col-10 "> '+
                    '<table class="table table-bordered table-condensed" id="option-value'+q+'"><thead><tr><th>Option Value</th><th>Quantity</th><th>Subtract Stock</th>'+
                    '<th>Price</th><th>Points</th><th>weight</th><th></th></tr></thead>'+
                    '<tfoot><tr><td colspan="7"><a  onclick="addOptionValue('+q+',\''+$(this).val()+'\');" class="btn btn-primary" data="'+$(this).val()+'">Add Option Value</td></tr></tfoot></table>'+
                    '</div></div>'+
                    '</div>'

                $("#demo-pill-nav").prepend(li_html);
                $("div#option-tab-content").append(div_html);

                e.stopImmediatePropagation()
                e.preventDefault();

            })


            $(".inline2").colorbox({inline:true, width:"80%",height:"80%"});


            $(".radimg").each(function(){
                $(this).click(function(){
                    $("#image").val($(this).val())
                    $("#imgg").html("<img src='<?php echo ASSETS_URL ?>/uploads/images/"+$(this).val()+ "' height='100' weight='100'>")
                    return false
                })
            })

            var progressbox     = $('#progressbox');
            var progressbar     = $('#progressbar');
            var statustxt       = $('#statustxt');
            var completed       = '0%';

            var options = {
                target:   '#output',   // target element(s) to be updated with server response
                beforeSubmit:  beforeSubmit,  // pre-submit callback
                uploadProgress: OnProgress,
                success:       afterSuccess,  // post-submit callback
                resetForm: true        // reset the form after successful submit
            };

            $('#MyUploadForm').submit(function() {
                $(this).ajaxSubmit(options);
                // return false to prevent standard browser submit and page navigation
                return false;
            });

//when upload progresses
            function OnProgress(event, position, total, percentComplete)
            {
                //Progress bar
                progressbar.width(percentComplete + '%') //update progressbar percent complete
                statustxt.html(percentComplete + '%'); //update status text
                if(percentComplete>50)
                {
                    statustxt.css('color','#fff'); //change status text to white after 50%
                }
            }

//after succesful upload
            function afterSuccess(data)
            {

                $('#submit-btn').show(); //hide submit button
                $('#loading-img').hide(); //hide submit button
                //alert(data)
                var md = data.split("@@");
                $("#image").val(md[1])
                $("#imgg").html("<img src='<?php echo ASSETS_URL ?>/uploads/images/"+md[1]+ "' height='100' weight='100'>")

            }

//function to check file size before uploading.
            function beforeSubmit(){
                //check whether browser fully supports all File API
                if (window.File && window.FileReader && window.FileList && window.Blob)
                {

                    if( !$('#imageInput').val()) //check empty input filed
                    {
                        $("#output").html("Oops please load a file?");
                        return false
                    }

                    var fsize = $('#imageInput')[0].files[0].size; //get file size
                    var ftype = $('#imageInput')[0].files[0].type; // get file type

                    //allow only valid image file types
                    switch(ftype)
                    {
                        case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                        break;
                        default:
                            $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
                            return false
                    }

                    //Allowed file size is less than 1 MB (1048576)
                    if(fsize>1048576)
                    {
                        $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
                        return false
                    }

                    //Progress bar
                    progressbox.show(); //show progressbar
                    progressbar.width(completed); //initial value 0% of progressbar
                    statustxt.html(completed); //set status text
                    statustxt.css('color','#000'); //initial color of status text


                    $('#submit-btn').hide(); //hide submit button
                    $('#loading-img').show(); //hide submit button
                    $("#output").html("");
                }
                else
                {
                    //Output error to older unsupported browsers that doesn't support HTML5 File API
                    $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
                    return false;
                }
            }

//function to format bites bit.ly/19yoIPO
            function bytesToSize(bytes) {
                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (bytes == 0) return '0 Bytes';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
            }
        })

    </script>

    <script type="text/javascript">
        var option_value_row = 0;

        function addOptionValue(option_row,option_type) {
            $.ajax({
                type:"get",
                url:"",
                data:"optionvalues="+option_type,
                success: function(output){
                    html  = '<tbody id="option-value-row' + option_value_row + '">';
                    html += '  <tr>';
                    html += '    <td class="left"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][option_value_id]">';
                    html += output;
                    html += '    </select><input type="hidden" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][option_type]" value="' + option_type + '" /><input type="hidden" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][product_option_value_id]" value="" /></td>';
                    html += '    <td class="right"><input type="text" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][quantity]" value="" size="3" /></td>';
                    html += '    <td class="left"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][subtract]">';
                    html += '      <option value="1">Yes</option>';
                    html += '      <option value="0">No</option>';
                    html += '    </select></td>';
                    html += '    <td class="right"><select style="display:inline" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][price_prefix]">';
                    html += '      <option value="+">+</option>';
                    html += '      <option value="-">-</option>';
                    html += '    </select>';
                    html += '    <input type="text" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][price]" value="" size="5" /></td>';
                    html += '    <td class="right"><select name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][points_prefix]">';
                    html += '      <option value="+">+</option>';
                    html += '      <option value="-">-</option>';
                    html += '    </select>';
                    html += '    <input type="text" style="display:inline" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][points]" value="" size="5" /></td>';
                    html += '    <td class="right"><select style="display:inline !important;" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][weight_prefix]">';
                    html += '      <option value="+">+</option>';
                    html += '      <option value="-">-</option>';
                    html += '    </select>';
                    html += '    <input type="text" style="display:inline !important;" name="product_option[' + option_row + '][product_option_value][' + option_value_row + '][weight]" value="" size="5" /></td>';
                    html += '    <td class="left"><a class="btn btn-danger" onclick="$(\'#option-value-row' + option_value_row + '\').remove();" class="button">Remove</a></td>';
                    html += '  </tr>';
                    html += '</tbody>';

                    $('#option-value' + option_row + ' tfoot').before(html);
                    option_value_row++;
                }
            })



        }
    </script>

    <!--<script>
        $(function () {
            'use strict';
            // Change this to the location of your server-side upload handler:
            var url =  'addnew',
                uploadButton = $('<button/>')
                    .addClass('btn btn-primary')
                    .prop('disabled', true)
                    .text('Processing...')
                    .on('click', function () {
                        var $this = $(this),
                            data = $this.data();
                        $this
                            .off('click')
                            .text('Abort')
                            .on('click', function () {
                                $this.remove();
                                data.abort();
                            });
                        data.submit().always(function () {
                            $this.remove();
                        });
                    });
            $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                autoUpload: false,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                maxFileSize: 5000000, // 5 MB
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/
                    .test(window.navigator.userAgent),
                previewMaxWidth: 100,
                previewMaxHeight: 100,
                previewCrop: true
            }).on('fileuploadadd', function (e, data) {
                data.context = $('<div/>').appendTo('#files');
                $.each(data.files, function (index, file) {
                    var node = $('<p/>')
                        .append($('<span/>').text(file.name));
                    if (!index) {
                        node
                            .append('<br>')
                            .append(uploadButton.clone(true).data(data));
                    }
                    node.appendTo(data.context);
                });
            }).on('fileuploadprocessalways', function (e, data) {
                var index = data.index,
                    file = data.files[index],
                    node = $(data.context.children()[index]);

                if (file.preview) {
                    node
                        .prepend('<br>')
                        .prepend(file.preview);
                    $("#imgg").html(file.preview)
                }
                if (file.error) {
                    node
                        .append('<br>')
                        .append($('<span class="text-danger"/>').text(file.error));
                }
                if (index + 1 === data.files.length) {
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
            }).on('fileuploadprogressall', function (e, data) {

                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }).on('fileuploaddone', function (e, data) {

                $.each(data.result.files, function (index, file) {

                    if (file.url) {

                        var link = $('<a>')
                            .attr('target', '_blank')
                            .prop('href', file.url);
                        $(data.context.children()[index])
                            .wrap(link);
                    } else if (file.error) {
                        var error = $('<span class="text-danger"/>').text(file.error);

                        $(data.context.children()[index])
                            .append('<br>')
                            .append(error);
                    }
                });
            }).on('fileuploadfail', function (e, data) {
                $.each(data.files, function (index) {
                    var error = $('<span class="text-danger"/>').text(''); //File upload failed.
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                });
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    </script>-->

<?php
//include footer
include("inc/google-analytics.php");
?>