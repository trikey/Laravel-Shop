@extends('baus')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="news-list">
            @foreach($brands as $arItem)

                <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
                    <a class="lead" href="{{ $arItem->url }}">
                        <b>{{ $arItem->name }}</b>
                    </a>
                    <br><br>
                    @if($arItem->preview_picture)
                        <a href="{{ $arItem->url }}">
                            <img class="preview_picture img-responsive" border="0" src="{{$arItem->preview_picture}}"
                                 alt="{{$arItem->name}}" title="{{$arItem->name}}" style="max-width: 500px;">
                        </a>
                    @endif
                    {{ $arItem->preview_text }}
                </div>

            @endforeach

            <br/>{!! $brands->render() !!}

        </div>

    </div>
@endsection