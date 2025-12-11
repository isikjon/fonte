@extends('layouts.app')

@section('title', $blog->title . ' — Fonte di Joy')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="bannerGreyTop">
            <h2>{{ $blog->title }}</h2>
            <p>{{ $blog->short_description }}</p>
        </div>
        <img src="/img/photo-bannerGreyTop.png" alt="" class="photo-bannerGreyTop">
    </div>
</section>

<section class="revSection revSection-2">
    <div class="container">
        <h2 class="titleAll">{{ $blog->title }}</h2>
        <div class="flexBlogPage">
            @if($blog->photo)
                <img src="{{ Storage::url($blog->photo) }}" alt="{{ $blog->title }}" class="flexBlogPageBanner">
            @endif

            @if($blog->content)
                <div class="flex-textAll-p blogContent">
                    {!! $blog->content !!}
                </div>
            @elseif($blog->description)
                <div class="flex-textAll-p blogContent">
                    <p class="textAll-p">{{ $blog->description }}</p>
                </div>
            @endif

            <p style="color: #999; margin-top: 30px;">Опубликовано: <span class="blog-date" data-date="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->locale('ru')->translatedFormat('d F Y') }}</span></p>
        </div>
    </div>
</section>
@endsection
