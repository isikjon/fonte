@extends('layouts.app')

@section('title', 'Блог — Fonte di Joy')

@php
    use App\Models\Blog;
    use App\Models\PageText;
    use Illuminate\Support\Facades\Storage;
    $blogs = Blog::active()->ordered()->paginate(6);
    $recentBlogs = Blog::active()->orderByDesc('created_at')->take(4)->get();
@endphp

@section('content')
<section class="bannerMainAboutSlider">
    <div class="container">
        <div class="bannerGreyTop">
            <h2>{{ PageText::getText('blog', 'banner_title', 'Блог питомника') }}</h2>
            <p>{{ PageText::getText('blog', 'banner_text', 'Полезные статьи о содержании и воспитании собак') }}</p>
        </div>
        <img src="/img/photo-bannerGreyTop.png" alt="" class="photo-bannerGreyTop">
    </div>
</section>

<section class="revSection revSection-2">
    <div class="container">
        <h2 class="titleAll">{{ PageText::getText('blog', 'blog_title', 'Блог') }}</h2>
        <div class="flexBlogCatalog">
            <div class="left-flexBlogCatalog">
                @forelse($blogs as $blog)
                <a href="{{ route('blog.item', $blog->slug) }}" class="block-left-flexBlogCatalog">
                    @if($blog->photo)
                        <img src="{{ Storage::url($blog->photo) }}" alt="{{ $blog->title }}" class="left-flexBlogCatalog__photo">
                    @else
                        <img src="/img/left-flexBlogCatalog.png" alt="{{ $blog->title }}" class="left-flexBlogCatalog__photo">
                    @endif
                    <div class="rightText-left-flexBlogCatalog">
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ $blog->short_description }}</p>
                        <span class="blog-date" data-date="{{ $blog->created_at->toDateString() }}">{{ $blog->created_at->locale('ru')->translatedFormat('d F Y') }}</span>
                    </div>
                </a>
                @empty
                <p>Статей пока нет</p>
                @endforelse

                @if($blogs->hasPages())
                <div class="flexPagination" style="margin-top: 0!important;">
                    @if($blogs->onFirstPage())
                        <span class="arrow-flexPagination" style="opacity: 0.5;">
                            <img src="/img/lPug.svg" alt="">
                        </span>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}" class="arrow-flexPagination">
                            <img src="/img/lPug.svg" alt="">
                        </a>
                    @endif

                    @foreach($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                        @if($page == $blogs->currentPage())
                            <span class="number-flexPagination number-flexPaginationActive">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="number-flexPagination">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}" class="arrow-flexPagination">
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
            <div class="right-flexBlogCatalog">
                <div class="flexBlock-right-flexBlogCatalog">
                    <h4>Последние статьи</h4>
                    @foreach($recentBlogs as $recentBlog)
                    <div class="line-flexBlock-right-flexBlogCatalog">
                        <p>{{ Str::limit($recentBlog->title, 30) }}</p>
                        <a href="{{ route('blog.item', $recentBlog->slug) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M7.4248 16.6L12.8581 11.1667C13.4998 10.525 13.4998 9.47503 12.8581 8.83336L7.4248 3.40002" stroke="#FB6F58" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
