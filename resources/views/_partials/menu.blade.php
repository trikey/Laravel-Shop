<ul class="nav navbar-nav">
@foreach($items as $item)
    <li @if($item->hasChildren())class ="dropdown" @endif>
        @if($item->link) <a {!! $item->attributes() !!} @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif href="{{ $item->url() }}">
            {!! $item->title !!}
            @if($item->hasChildren()) <b class="caret"></b> @endif
        </a>
        @else
            {{$item->title}}
        @endif
        @if($item->hasChildren())
            <ul class="dropdown-menu">
                @foreach($item->children() as $child)
                    <li @if($child->active) class="active" @endif><a href="{{ $child->url() }}">{{ $child->title }}</a></li>
                @endforeach
            </ul>
        @endif
    </li>
    @if($item->divider)
        <li{{\HTML::attributes($item->divider)}}></li>
    @endif
@endforeach
</ul>