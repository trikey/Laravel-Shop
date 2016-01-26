@extends('baus')



@section('content')

<div class="news-list">

@if($offers)

    @foreach($offers as $arItem)
        <p class="news-item">
                <b>{{ $arItem["name"] }}</b><br /><br />
                @if($arItem["preview_picture"])
                    <img
                        class="preview_picture img-responsive"
                        border="0"
                        src="{{$arItem["preview_picture"]}}"
                        alt="{{$arItem["name"]}}"
                        title="{{$arItem["name"]}}"
                        style="max-width: 500px;"
                        />
                @endif
                @if($arItem["preview_text"])
                    {{$arItem["preview_text"]}}
                @endif
                <div style="clear:both"></div>
            </p>
        <hr/>
        <br/>
    @endforeach
    {!! $offers->render() !!}
@endif


</div>

@endsection