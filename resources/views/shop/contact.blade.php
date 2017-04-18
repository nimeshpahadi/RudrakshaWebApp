@extends('shop.layout.app')

@section('main-content')

    @include('shop.layout.breadcrum')
    <section class="adv-innerpage-content">
        <div class="container">
            <div class="adv-inner-page-slider-content contact-page-content-holder">
                <div class="contacts-page-content">
                    <h2>Contact Us | <a  href="/faq">FAQ</a></h2>



                    <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="adv-form-holder">
                                <form>

                                    <div class="group">
                                        <input type="text" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Name</label>
                                    </div>

                                    <div class="group">
                                        <input type="text" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Last Name</label>
                                    </div>

                                    <div class="group">
                                        <input type="text" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Contact Number</label>
                                    </div>

                                    <div class="group">
                                        <input type="text" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Email</label>
                                    </div>

                                    <div class="group group1">
                                        <textarea  type="text" class="form-control" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Message</label>
                                    </div>
                                    <input type="submit" class="button" value="Send Now"/>

                                </form>

                            </div>
                        </div><!-- .col -->

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="adv-contact-info-text">
                                <p>Thank you for your interest in Rudrax. Please feel free to contact us by submitting the form on the left or call us at the numbers below for assistance with reservations, to book an event, or with any questions you may have. </p>

                                <p>We look forward to hearing from you & hope to see you soon in our little paradise!</p>

                                <!-- <div class="col-md-3 col-sm-6 pre-footer-col"> -->

                                <address class="footer-address footer-address1">
                                    <span class="address location"> 8903 Tonstall Road, <br> Epsom surrey, UK </span> <br>
                                    <span class="address tel"> Phone: +986879-8705, +760-7483-349 </span> <br>
                                    <span class="address email ">  <a href="#"> Email:resturant@demo.com </a></span>
                                </address>
                                <!--  </div> -->
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .contacts-page-content -->
            </div><!-- contact-page-content-holder -->
        </div><!-- .container-exceed -->

    </section><!-- .adv-innerpage-content -->
 @endsection
