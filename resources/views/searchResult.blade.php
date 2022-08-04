@extends('layouts.app')
@section('title', 'Search Results | ')

@section('content')
<div class="main">
    <div class="sub-banner">
        <div class="container">
            <div class="page-name">
                <div class="sub-banner-text-content">
                    <h1>Search Results</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>/</span>Search Results</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Properties section body start -->
    <div class="properties-section content-area searchResultPage">
        <div class="service-detail-container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if ($services1)
                        <div class="row row-flex searchResults 1">
                            @foreach($services1 as $services1)
                                @if ($loop->index < 30 && $services1->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services1->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Like{{$services1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services1->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services1->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Like{{$services1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services1->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services1->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Like{{$services1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services1->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services1->slug)}}">{{ Str::limit($services1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services1->likes->count()}} Like{{$services1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if ($services2)
                        <div class="row row-flex searchResults 2">
                            @foreach($services2 as $services2)
                                @if ($loop->index < 30 && $services2->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services2->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Like{{$services2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services2->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Like{{$services2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services2->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Like{{$services2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services2->slug)}}">{{ Str::limit($services2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services2->likes->count()}} Like{{$services2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if ($services3)
                        <div class="row row-flex searchResults 3">
                            @foreach($services3 as $services3)
                                @if ($loop->index < 30 && $services3->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services3->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Like{{$services3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services3->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Like{{$services3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services3->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 22) }}</a>
                                                        <a class="title" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Like{{$services3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services3->slug)}}">{{ Str::limit($services3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services3->likes->count()}} Like{{$services3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if ($services4)
                        <div class="row row-flex searchResults 4">
                            @foreach($services4 as $services4)
                                @if ($loop->index < 30 && $services4->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services4->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services4->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Like{{$services4->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services4->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services4)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services4->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 22) }}</a>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Like{{$services4->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services4->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services4)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services4->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Like{{$services4->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services4)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services4->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services4->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services4->slug)}}">{{ Str::limit($services4->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services4->likes->count()}} Like{{$services4->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services4->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services4->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if ($services5)
                        <div class="row row-flex searchResults 5">
                            @foreach($services5 as $services5)
                                @if ($loop->index < 30 && $services5->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $services5->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services5->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Like{{$services5->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services5->badge_type == 2)
                                    <a href="{{route('serviceDetail', $services5)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services5->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Like{{$services5->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $services5->badge_type == 3)
                                    <a href="{{route('serviceDetail', $services5->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services5->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Like{{$services5->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $services5->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($services5->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$services5->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $services5->slug)}}">{{ Str::limit($services5->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$services5->likes->count()}} Like{{$services5->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $services5->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$services5->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif




                            @endforeach
                        </div>
                    @endif




                     @if (isset($keywordResponses1))
                        <div class="row row-flex searchResults k1">
                            @foreach($keywordResponses1 as $keywordResponses1)
                                @if ($loop->index < 30 && $keywordResponses1->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $keywordResponses1->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($keywordResponses1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses1->likes->count()}} Like{{$keywordResponses1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses1->badge_type == 2)
                                    <a href="{{route('serviceDetail', $keywordResponses1)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses1->likes->count()}} Like{{$keywordResponses1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses1->badge_type == 3)
                                    <a href="{{route('serviceDetail', $keywordResponses1->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses1->likes->count()}} Like{{$keywordResponses1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $keywordResponses1->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses1->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses1->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses1->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses1->likes->count()}} Like{{$keywordResponses1->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses1->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses1->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if (isset($keywordResponses2))
                        <div class="row row-flex searchResults k2">
                            @foreach($keywordResponses2 as $keywordResponses2)
                                @if ($loop->index < 30 && $keywordResponses2->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $keywordResponses2->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($keywordResponses2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses2->likes->count()}} Like{{$keywordResponses2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses2->badge_type == 2)
                                    <a href="{{route('serviceDetail', $keywordResponses2)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses2->likes->count()}} Like{{$keywordResponses2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses2->badge_type == 3)
                                    <a href="{{route('serviceDetail', $keywordResponses2->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses2->likes->count()}} Like{{$keywordResponses2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $keywordResponses2->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses2->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses2->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses2->slug)}}">{{ Str::limit($keywordResponses2->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses2->likes->count()}} Like{{$keywordResponses2->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses2->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses2->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif


                    @if (isset($keywordResponses3))
                        <div class="row row-flex searchResults k3">
                            @foreach($keywordResponses3 as $keywordResponses3)
                                @if ($loop->index < 30 && $keywordResponses3->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $keywordResponses3->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($keywordResponses3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses3->slug)}}">{{ Str::limit($keywordResponses3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses3->slug)}}">{{ Str::limit($keywordResponses3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses3->likes->count()}} Like{{$keywordResponses3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses3->badge_type == 2)
                                    <a href="{{route('serviceDetail', $keywordResponses3)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses3->slug)}}">{{ Str::limit($keywordResponses3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses3->slug)}}">{{ Str::limit($keywordResponses3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses3->likes->count()}} Like{{$keywordResponses3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses3->badge_type == 3)
                                    <a href="{{route('serviceDetail', $keywordResponses1->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses3->slug)}}">{{ Str::limit($keywordResponses3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses3->slug)}}">{{ Str::limit($keywordResponses3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses3->likes->count()}} Like{{$keywordResponses3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $keywordResponses3->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses3->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses3->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses3->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses1->slug)}}">{{ Str::limit($keywordResponses3->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses3->likes->count()}} Like{{$keywordResponses3->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses3->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses3->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif


                    @if (isset($keywordResponses6))
                        <div class="row row-flex searchResults k6">
                            @foreach($keywordResponses6 as $keywordResponses6)
                                @if ($loop->index < 30 && $keywordResponses6->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $keywordResponses6->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($keywordResponses6->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses6->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses6->likes->count()}} Like{{$keywordResponses6->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses6->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses6->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses6->badge_type == 2)
                                    <a href="{{route('serviceDetail', $keywordResponses6)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses6->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses6->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses6->likes->count()}} Like{{$keywordResponses6->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses6->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses6->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keywordResponses6->badge_type == 3)
                                    <a href="{{route('serviceDetail', $keywordResponses6->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses6->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses6->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses6->likes->count()}} Like{{$keywordResponses6->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses6->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses6->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $keywordResponses6->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keywordResponses6->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keywordResponses6->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keywordResponses6->slug)}}">{{ Str::limit($keywordResponses6->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keywordResponses6->likes->count()}} Like{{$keywordResponses6->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keywordResponses6->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keywordResponses6->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif


                    @if (isset($keyword_and_Categories))
                        <div class="row row-flex searchResults k7">
                            @foreach($keyword_and_Categories as $keyword_and_Categories)
                                @if ($loop->index < 30 && $keyword_and_Categories->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $keyword_and_Categories->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($keyword_and_Categories->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_Categories->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_Categories->likes->count()}} Like{{$keyword_and_Categories->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_Categories->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keyword_and_Categories->badge_type == 2)
                                    <a href="{{route('serviceDetail', $keyword_and_Categories)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keyword_and_Categories->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_Categories->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_Categories->likes->count()}} Like{{$keyword_and_Categories->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_Categories->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keyword_and_Categories->badge_type == 3)
                                    <a href="{{route('serviceDetail', $keyword_and_Categories->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keyword_and_Categories->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_Categories->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_Categories->likes->count()}} Like{{$keyword_and_Categories->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_Categories->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $keyword_and_Categories->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keyword_and_Categories->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_Categories->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">{{ Str::limit($keyword_and_Categories->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_Categories->likes->count()}} Like{{$keyword_and_Categories->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_Categories->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_Categories->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif


                    @if (isset($keyword_and_state))
                        <div class="row row-flex searchResults k7">
                            @foreach($keyword_and_state as $keyword_and_state)
                                @if ($loop->index < 30 && $keyword_and_state->badge_type == 1)
                                    <a href="{{ route('serviceDetail', $keyword_and_state->slug) }}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> Super</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize;">
                                                            {{ Str::limit($keyword_and_state->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_state->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_state->likes->count()}} Like{{$keyword_and_state->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_state->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_state->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keyword_and_state->badge_type == 2)
                                    <a href="{{route('serviceDetail', $keyword_and_state)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-success"><i class="fa fa-star"></i><i class="fa fa-star"></i> Moderate</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keyword_and_state->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_state->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_state->likes->count()}} Like{{$keyword_and_state->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_state->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_state->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @elseif ($loop->index < 30 && $keyword_and_state->badge_type == 3)
                                    <a href="{{route('serviceDetail', $keyword_and_state->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="listing-badges">
                                                        <span class="featured bg-primary"><i class="fa fa-star"></i> Basic</span>
                                                    </div>
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keyword_and_state->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_state->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_state->likes->count()}} Like{{$keyword_and_state->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_state->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_state->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{route('serviceDetail', $keyword_and_state->slug)}}" class="property-img">
                                        <div class="col-lg-4 col-md-4 col-sm-6 filtr-item" data-category="3, 2, 1" style="">
                                            <div class="property-box">
                                                <div class="property-thumbnail">
                                                    <div class="price-ratings-box">
                                                        <p class="price" style="text-transform: capitalize">
                                                            {{ Str::limit($keyword_and_state->user->name, 20) }}
                                                        </p>
                                                    </div>
                                                    <img class="d-block w-100 service_images" src="{{asset('uploads/services')}}/{{$keyword_and_state->service_image}}" alt="properties">

                                                </div>
                                                <div class="detail">
                                                    <div>
                                                        <a class="title title-dk" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 22) }}</a>
                                                        <a class="title title-mb" href="{{route('serviceDetail', $keyword_and_state->slug)}}">{{ Str::limit($keyword_and_state->name, 15) }}</a>
                                                    </div>

                                                    <ul class="d-flex flex-row justify-content-between info">
                                                        <li>
                                                            <i class="fa fa-thumbs-up text-warning" aria-hidden="true" style="font-size: 11px;"></i> {{$keyword_and_state->likes->count()}} Like{{$keyword_and_state->likes->count() > 1 ? 's' : ''}}
                                                        </li>
                                                        <li>
                                                            <a class="pull-right" href="{{route('serviceDetail', $keyword_and_state->slug)}}">
                                                                <i class="fa fa-map-marker text-warning"></i> {{$keyword_and_state->state}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif

                    @if(!$services1 and !$services2 and !$services3 and !$services4 and !$services5)
                        <div class="info">
                            <h4>Ooops, The Item Could Not Be Found!</h4>
                            <p>The item you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                            <div class="hr"></div>
                            <p>Please try searching again with a diffenrent keyword this time.</p>
                        </div>
                    @endif
                </div>



                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-left">
                        <!-- Advanced search start -->
                        <div class="sidebar widget advanced-search none-992">
                            <h3 class="sidebar-title">Search For A Service</h3>

                            <form action="{{route('search3')}}" method="GET" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group name">
                                            <input type="text" name="name" class="form-control" placeholder="What Service Are You Looking For?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <p style="font-weight: 600; margin-bottom: 0;">Choose Distance(in km): <span id="demo"></span></p>
                                    <div class="slidecontainer" style="margin-bottom: 15px;">
                                        <input type="range" min="1" max="1000000" name="ranges"  value="5000" class="slider" id="myRange">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group subject">
                                       <!--  <input type="text" name="serviceDetail_id" value= class="form-control"> -->
                                   </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                                    <div class="form-group subject">
                                        <select class="form-control" id="state" name="state">
                                            <option class="text-center" value="">--Choose a state--</option>
                                            @if(isset($all_states))
                                                @foreach($all_states as $state)
                                                    <option value="{{$state->id}}"> {{ $state->name }}  </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="send-btn">
                                        <button type="submit" class="btn btn-outline-warning btn-block bg-warning text-white">Search  <i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="footer-item clearfix container-fluid">
                            <br/>
                            <div class="s-border" style="margin-top: -20px;"></div>
                            <div class="m-border"></div>
                        </div>
                        <div class="popular-posts featured-ad-hm-list">
                            <div class="container">
                                <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                    {{-- <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol> --}}
                                    <div class="carousel-inner">
                                        @if ($advertisements)
                                            @foreach($advertisements as $advertisement)
                                                @if ($advertisement->advert_location == 3)
                                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                                        <img class="d-block mx-auto img-fluid" src="{{asset('uploads/sponsored/'.$advertisement->banner_img)}}" alt="{{ $advertisement->brand_name }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No Advert here!</p>
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="s-border" style="margin-top: 20px;"></div>
                        <div class="m-border"></div>
                        <br/>

                        <!-- Popular posts start -->
                        <div class="widget popular-posts">
                            <h3 class="sidebar-title">Featured Services</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            @if(isset($featuredServices))
                                @foreach($featuredServices as $featuredService)
                                    <a href="{{ route('serviceDetail', $featuredService) }}">
                                        <div class="media">
                                            <div class="media-left">
                                                <img class="media-object" src="{{asset('uploads/services')}}/{{$featuredService->service_image}}">
                                            </div>
                                            <div class="media-body align-self-center">
                                                <p class="fea-ad-hm-location tt-capitalize">
                                                    <strong>{{ Str::limit($featuredService->name, 30)}}</strong>
                                                </p>
                                                <p class="fea-ad-hm-location  tt-capitalize">
                                                    <strong>Provider:</strong> {{$featuredService->user->name}} <br>  <strong>Location:</strong> {{ Str::limit($featuredService->state, 30)}}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>

                        <div class="footer-item clearfix container-fluid">
                            <br/>
                            <div class="s-border" style="margin-top: -15px;"></div>
                            <div class="m-border"></div>
                        </div>
                        <div class="popular-posts featured-ad-hm-list">
                            <div class="container">
                                <div id="carouselExampleControls" class="carousel vert slide" data-ride="carousel" data-interval="4000">
                                    {{-- <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol> --}}
                                    <div class="carousel-inner">
                                        @if ($advertisements)
                                            @foreach($advertisements as $advertisement)
                                                @if ($advertisement->advert_location == 5)
                                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                                        <img class="d-block mx-auto img-fluid" src="{{asset('uploads/sponsored/'.$advertisement->banner_img)}}" alt="{{ $advertisement->brand_name }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <p>No Advert here!</p>
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Helping Center start -->
                        <div class="widget helping-center">
                            <h3 class="sidebar-title">Help Center</h3>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="contact-link">
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:{{ $check_general_info == 0 ? $general_info->hot_line : '' }}">
                                        {{ $check_general_info == 0 ? $general_info->hot_line : '' }}
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-technology-1"></i>
                                    <a href="tel:{{ $check_general_info == 0 ? $general_info->hot_line_2 : '' }}">
                                        {{ $check_general_info == 0 ? $general_info->hot_line_2 : '' }}
                                    </a>
                                </li>
                                <li>
                                    <a style="color: #05cc6c" href="https://wa.me/{{ $check_general_info == 0 ? $general_info->hot_line_3 : '' }}/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services.">
                                        <i class="fa fa-whatsapp" style="color: #05cc6c"></i>
                                        WhatsApp Message
                                    </a>
                                </li>
                                <li>
                                    <i class="flaticon-envelope"></i>
                                    <a href="mailto:{{ $check_general_info == 0 ? $general_info->header_email : '' }}">
                                        {{ $check_general_info == 0 ? $general_info->header_email : '' }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

@endsection
