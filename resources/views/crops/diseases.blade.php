@extends('layouts.admin')
@section('content')
 <section class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="{{asset('assets/img/slide/1.jpg')}}" alt="fullslide1" data-bgposition="center center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                    <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="{{asset('assets/img/slide/2.jpg')}}" alt="fullslide1" data-bgposition="top center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
            <div class="filter-title">
                <div class="title-header">
                    <h2 style="color:#fff;">iGrowers Infohub</h2>
                    <p class="lead">For what crop do you seek the services </p>
                </div>
            </div>
        </section>
        <section class="content-central">
            <div class="content_info">
                <div>
                    <div class="container">
                        <div class="portfolioContainer">
                            @foreach ($crops as $crop)
                            <div class="col-col-xs-12 col-sm-6 col-md-3 hsgrids"
                                style="padding-right: 5px;padding-left: 5px;">
                                <a class="g-list" href="{{ route('showDiseases', $crop->id) }}">
                                    <div class="img-hover">
                                        <img src="{{asset($crop->image)}}" alt="{{$crop->name}}"
                                            class="img-responsive">
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{$crop->name}}</h3>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </section>

@endsection