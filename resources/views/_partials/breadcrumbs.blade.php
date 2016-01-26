@if ($breadcrumbs)
    <div class="row">
        <div class="breadcrumbDiv col-lg-12">
            <ul class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$breadcrumb->last)
                        <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li class="active"><a href="#">{{ $breadcrumb->title }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif