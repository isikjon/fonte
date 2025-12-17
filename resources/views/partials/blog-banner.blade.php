@php
    use App\Models\BlogBanner;
    $banner = BlogBanner::active()->find($bannerId);
@endphp
@if($banner && $banner->subtitle)
<div class="blogBannerBlock">
    <p>{{ $banner->subtitle }}</p>
</div>
@endif

