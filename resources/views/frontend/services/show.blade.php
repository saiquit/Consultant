@extends('layouts.frontend.app')
@section('title')
{{$service->name}}
@endsection
@section('content')
<section class="services-details">
    <div class="container pt-50 pb-80">
        <div class="row">
            <div class="col-md-7">
                <div class="text-white text-left pt-20 pb-10">
                    <h1 class="pb-10">Bangladesh’s Top {{$service->name}} Consultants Under One Roof</h1>
                    <p><span class="text-white">Connect with trusted and verified <b> {{$service->name}} consultants</b>
                            in the country</span></p>
                </div>
                <div class="row">
                    <div class="col-4 center">
                        <h2>800+</h2>
                        <p>{{$service->name}}</p>
                    </div>
                    <div class="col-4 center">
                        <h2>800+</h2>
                        <p>{{$service->name}}</p>
                    </div>
                    <div class="col-4 center">
                        <h2>800+</h2>
                        <p>{{$service->name}}</p>
                    </div>
                </div>

            </div>
            <div class="col-md-5 col-sm-12 border" style="border-radius: 5px">
                <div class="pl-20 pr-20 mt-0 bg-dark-transparent-2 pt-50 bordered">
                    <div class="text-center">
                        <p style="font-size:21px;" class="mt-0 font-weight-600 mpt-50 text-white">Talk to Our<span
                                class="text-pink"> {{$service->name}} Consultant</span>
                        </p>
                    </div>
                    <!-- Appilication Form Start-->
                    <form action="" method="post" class="">
                        <div class="form-group row">
                            <div class="col-sm-12 py-2">
                                <input type="email" class="form-control" id="" placeholder="Email">
                            </div>
                            <div class="col-sm-12 py-2">
                                <input type="text" class="form-control" id="" placeholder="Name">
                            </div>
                            <div class="col-sm-12 py-2">
                                <input type="tel" class="form-control" id="" placeholder="Telephone">
                            </div>
                            <div class="col-sm-12 py-2">
                                <button type="submit" class="send-btn">Send</button>
                            </div>
                        </div>
                    </form>
                    <!-- Application Form End-->


                </div>
            </div>
        </div>

    </div>
</section>
<section class="mt-100 mb-100">
    <div class="container">
        <div class="row pb-10">
            <h2>About Chemical Consultants from SolutionBuggy</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>{{$service->about}}</p>
            </div>
            <div class="col-md-6">
                <ul class="list-group list-group-flush about_list">
                    <li class="list-group-item ">An item</li>
                    <li class="list-group-item ">A second item</li>
                    <li class="list-group-item ">A third item</li>
                    <li class="list-group-item ">A fourth item</li>
                    <li class="list-group-item ">And a fifth one</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection