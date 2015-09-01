


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <div class="modal-body" style="text-align: center">

                    </div>

                </div>
            </div>
        </div>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Chartered Marketers</h4>
                    <div>
                        <p>
                            We strive to sell our products fast and transparently at good and
                            reasonable price so both the bidders and the owners can check the platform daily to know when
                            when and at what price we sold the product
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="widget">
                    <h4 class="widget-title">Information</h4>
                    <div>
                        <ul>
                            <li><a href="{{url()}}"><i class="fa fa-chevron-right"></i> Home</a></li>
                            <li><a href="{{url()}}/pages/about-us"><i class="fa fa-chevron-right"></i> About us</a></li>
                            <li><a href="{{url()}}/pages/delivery-information"><i class="fa fa-chevron-right"></i> Delivery Information </a></li>
                            <li><a href="{{url()}}/pages/privacy-policy"><i class="fa fa-chevron-right"></i> Privacy Policy</a></li>
                            <li><a href="{{url()}}/pages/terms-&-conditions"><i class="fa fa-chevron-right"></i> Terms &amp; Conditions</a></li>
                            <li><a href="{{url()}}/pages/contact"><i class="fa fa-chevron-right"></i> Our Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                    <div class="widget">
                        <h4 class="widget-title">Contact Us</h4>
                        <div>
                            <div class="contact-info">
                                <i class="fa fa-map-marker"></i>
                                <p>23, Adekunle Fajuyi Street, Ikeja, Lagos, Nigeria</p>
                                <p>&nbsp;</p>

                                <p>Email: <a href="mailto:info@charteredmarketersauction.com.ng">info@charteredmarketersauction.com.ng</a></p>

                            </div>
                        </div>
                        <div>
                            <div class="contact-info">
                                <i class="fa  fa-mobile-phone"></i>
                                <p>Tell: +2349099213867</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget">
                    <h4 class="widget-title">Newsletter Subscribe</h4>
                    <form action="#" method="post">
                        <input type="email" name="your_email">
                        <button class="pull-right" type="submit">
                            Subscribe
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- #footer -->
<div class="copyright">
    <div class="container">
        <p class="pull-left">Privacy policy. (&copy;) 2015</p>
        <p class="pull-right pay-options">
            <a href="#"><img src="<?php echo ASSETS_URL ?>/img/master.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo ASSETS_URL ?>/img/pay.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo ASSETS_URL ?>/img/visa.jpg" alt="" /></a>
            <a href="#"><img src="<?php echo ASSETS_URL ?>/img/paypal.jpg" alt="" /></a>
        </p>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .copyright -->
        <?php Session::forget("error_message") ?>
        <?php Session::forget("success_message") ?>




