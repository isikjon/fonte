@php
    use App\Models\BlogBanner;
    $banner = BlogBanner::active()->find($bannerId);
@endphp
@if($banner)
<div class="blockDeliveryBold">
    @if($banner->title)
    <h5>{{ $banner->title }}</h5>
    @endif
    @if($banner->subtitle)
    <p style="margin-top: 10px; color: #434C4C; font-family: 'Open Sans', sans-serif; font-size: 18px; line-height: 28px;">{{ $banner->subtitle }}</p>
    @endif
</div>
@endif

