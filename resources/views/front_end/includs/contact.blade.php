<!-- Start Contact -->
<div id="contact" class="contact-area contact-page overflow-hidden default-padding" style="background-image: url({{ asset('assets/front_end/img/shape/map-light.png') }});">
    <div class="container">
        <div class="row">

            <div class="col-tact-stye-one col-lg-5 pr-50 pr-md-15 pr-xs-15">
                <div class="contact-style-one-info">
                    <div class="top-info">
                        <h2 class="gradient-text">Let's Talk</h2>
                        <div class="call">
                            <img src="{{ asset('assets/front_end/img/icon/call.png') }}" alt="Image not Found">
                            <a class="phone-link" href="tel:+4733378901">+4733378901</a>
                        </div>
                    </div>
                    <ul class="contact-address">
                        <li>
                            <div class="info">
                                <h4>Location</h4>
                                <p>
                                    55 Main Street, The Grand Avenue <br> 2nd Block, New York City
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="info">
                                <h4>Official Email</h4>
                                <a href="mailto:info@digital.com.com">info@digital.com</a>
                            </div>
                        </li>
                    </ul>
                    <p class="copyright">
                        &copy; 2023 Ventix. All Rights Reserved
                    </p>
                </div>
            </div>

            <div class="col-tact-stye-one col-lg-7 pl-60 pl-md-15 pl-xs-15 mt-md-50 mt-xs-50">
                <div class="contact-form-style-one">
                    <form action="{{ asset('assets/front_end/mail/contact.php') }}" method="POST" class="contact-form contact-form mt-30">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" placeholder="Email*" type="email">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="phone" placeholder="Phone" type="text">
                                    <span class="alert-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comments" name="comments" placeholder="Tell Us About Project *"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" name="submit" id="submit">
                                    <i class="fa fa-paper-plane"></i> Get in Touch
                                </button>
                            </div>
                        </div>
                        <!-- Alert Message -->
                        <div class="col-lg-12 alert-notification">
                            <div id="message" class="alert-msg"></div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Signle Item -->
