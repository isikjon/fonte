@extends('layouts.app')

@section('title', 'Щенки на продажу — Fonte di Joy')

@php
    use App\Models\PageText;
    use App\Models\Puppy;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    $puppies = Puppy::active()->ordered()->paginate(12);
@endphp

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="bannerGreyTop">
            <h2>{{ PageText::getText('catalog', 'banner_title', 'Щенки на продажу') }}</h2>
            <p>{{ PageText::getText('catalog', 'banner_text', 'Выберите своего идеального питомца из нашего питомника.') }}</p>
        </div>
        <img src="/img/photo-bannerGreyTop.png" alt="" class="photo-bannerGreyTop">
    </div>
</section>

<section class="revSection revSection-2">
    <div class="container">
        <h2 class="titleAll titleAll-center">{{ PageText::getText('catalog', 'catalog_title', 'Щенки на продажу') }}</h2>
        <div class="flexCatalogCards">
            @foreach($puppies as $puppy)
            <div class="contentMainSellSlide">
                @if($puppy->is_new)
                    <img src="/img/new.svg" alt="" class="newTag">
                @endif
                @if($puppy->photo)
                    @if(Str::endsWith(strtolower($puppy->photo), ['.mp4', '.webm', '.mov']))
                        <video src="{{ Storage::url($puppy->photo) }}" class="photoContentMainSellSlide" muted autoplay loop playsinline></video>
                    @else
                        <img src="{{ Storage::url($puppy->photo) }}" alt="{{ $puppy->name }}" class="photoContentMainSellSlide">
                    @endif
                @else
                    <img src="/img/contentMainSellSlide__img.png" alt="{{ $puppy->name }}" class="photoContentMainSellSlide">
                @endif
                <div class="text-contentMainSellSlide">
                    <h3>{{ $puppy->name }}</h3>
                    <p>{{ $puppy->catalog_short_description }}</p>
                    <div class="flex-text-contentMainSellSlide">
                        <a href="{{ route('catalog.item', $puppy->slug) }}" class="linkSlideBigMain">Подробнее</a>
                        <span>{{ $puppy->formatted_price }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($puppies->hasPages())
        <div class="flexPagination">
            @if($puppies->onFirstPage())
                <span class="arrow-flexPagination" style="opacity: 0.5;">
                    <img src="/img/lPug.svg" alt="">
                </span>
            @else
                <a href="{{ $puppies->previousPageUrl() }}" class="arrow-flexPagination">
                    <img src="/img/lPug.svg" alt="">
                </a>
            @endif

            @foreach($puppies->getUrlRange(1, $puppies->lastPage()) as $page => $url)
                @if($page == $puppies->currentPage())
                    <span class="number-flexPagination number-flexPaginationActive">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="number-flexPagination">{{ $page }}</a>
                @endif
            @endforeach

            @if($puppies->hasMorePages())
                <a href="{{ $puppies->nextPageUrl() }}" class="arrow-flexPagination">
                    <img src="/img/rPug.svg" alt="">
                </a>
            @else
                <span class="arrow-flexPagination" style="opacity: 0.5;">
                    <img src="/img/rPug.svg" alt="">
                </span>
            @endif
        </div>
        @endif
    </div>
</section>
@endsection
