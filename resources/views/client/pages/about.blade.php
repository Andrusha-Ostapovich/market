@extends('client.layouts.app')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1> {!! $page->content !!}</h1>
                        <p><a href="/catalog" class="btn btn-secondary me-2">Shop Now</a><a href="#"
                                class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="client/images/couch.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
@endsection
