@extends('baus')

@section('content')

@include('blog/common')

@if($articles)

<div class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered blog-left">
                <div class="bl-inner">
                    @foreach ($articles as $arItem)
                        <div class="item-blog-post">
                            <div class="post-header clearfix">
                                <h2 class="wow  fadeIn  " data-wow-duration="0.2s">
                                    <a href="{{ $arItem["url"] }}">{{ $arItem["name"] }}</a>
                                </h2>

                                <div class="post-info">
                                    @if ($arItem["active_from"])
                                        <span>{{$arItem["active_from"]}}</span>
                                    @endif

                                    <div class="share-gallery pull-right no-float-xs">
                                        <div class="addthis_sharing_toolbox"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="post-main-view">
                                @if ($arItem["preview_picture"])
                                    <div class="post-lead-image  wow fadeInDown  " data-wow-duration="0.2s">
                                        <a href="{{ $arItem["url"] }}">
                                            <img src="{{ $arItem["preview_picture"] }}" class="img-responsive" alt="{{ $arItem["name"] }}">
                                        </a>
                                    </div>
                                @endif
                                <div class="post-description  wow fadeInDown  " data-wow-duration="0.2s">
                                    <p>{{ $arItem["preview_text"] }}</p>
                                    <a href="{{ $arItem["url"] }}" class="btn btn-more"> Читать далее <i
                                            class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $articles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection