@php
    use App\Models\BlogBanner;
    use Illuminate\Support\Facades\Storage;
    $banner = BlogBanner::active()->find($bannerId);
@endphp
@if($banner && $banner->image)
<div class="blogBanner" style="background-image: url('{{ Storage::url($banner->image) }}');">
    @if($banner->title || $banner->subtitle)
    <div class="blogBanner__content">
        @if($banner->title)
        <h3>{{ $banner->title }}</h3>
        @endif
        @if($banner->subtitle)
        <p>{{ $banner->subtitle }}</p>
        @endif
    </div>
    @endif
</div>
@endif

