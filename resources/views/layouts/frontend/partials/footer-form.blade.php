<!-- Request Back Start -->
<div id="request-back-area"></div>
<div class="request-back-area section-padding30">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <div class="request-content">
                    <h3>Request for Call Back</h3>
                    <p>To get easy, quick and accurate solution from our expertise.</p>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <!-- Contact form Start -->
                <div class="form-wrapper">
                    <form id="contact-form" action="{{ route('request-email') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-box  mb-10">
                                    <div class="wrapper">
                                        <input type="radio" name="type" value="industry" id="option-1" checked>
                                        <input type="radio" name="type" value="consultant" id="option-2">
                                        <label for="option-1" class="option option-1">
                                            <div class="dot"></div>
                                            <span>Industry</span>
                                        </label>
                                        <label for="option-2" class="option option-2">
                                            <div class="dot"></div>
                                            <span>Consultant</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box mb-30">
                                    <input type="text" name="name" placeholder="Name" value="">
                                    @if($errors->has('name'))
                                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box mb-30">
                                    <input type="text" name="phone" placeholder="Phone" value="">
                                    @if($errors->has('phone'))
                                    <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-box mb-30">
                                    <input type="email" name="email" placeholder="Email">
                                    @if($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-30">
                                <div class="select-itms">
                                    <select name="services" id="select1">
                                        <option value="">Services</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-12 col-md-12 mb-30">
                                <div class="form-box mb-30">
                                    <input class="" name="message" placeholder="Your message" />
                                    @if($errors->has('message'))
                                    <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="send-btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- Contact form End -->
        </div>
    </div>
</div>
<!-- Request Back End -->