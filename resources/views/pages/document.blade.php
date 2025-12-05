@extends('layouts.app')

@section('title', $document->title . ' — Fonte di Joy')

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="bannerGreyTop">
            <h2>{{ $document->title }}</h2>
        </div>
        <img src="/img/photo-bannerGreyTop.png" alt="" class="photo-bannerGreyTop">
    </div>
</section>

<section class="revSection revSection-2">
    <div class="container">
        <div class="flexBlogPage">
            <div class="document-content">
                {!! $document->content !!}
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .document-content h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }
    .document-content h3 {
        font-size: 18px;
        margin: 25px 0 15px;
        color: #444;
    }
    .document-content p {
        margin-bottom: 15px;
        line-height: 1.7;
        color: #666;
    }
    .document-content ul {
        margin: 15px 0;
        padding-left: 25px;
    }
    .document-content li {
        margin-bottom: 8px;
        line-height: 1.6;
        color: #666;
    }
</style>
@endpush

