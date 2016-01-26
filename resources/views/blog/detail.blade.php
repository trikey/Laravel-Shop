@extends('baus')

@section('content')

@include('blog/common')

<div class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered blog-left">
                <div class="bl-inner">
                    <div class="item-blog-post">
                        <div class="post-header clearfix">
                            <h2 class="fadeInDown  wow" data-wow-duration="0.2s" data-wow-delay=".5s">{{ $article["name"]}}</h2>

                            <div class="post-info">
                                <span>{{$article["active_from"]}}</span>

                                <div class="share-gallery pull-right no-float-xs">
                                    <div class="addthis_sharing_toolbox"></div>
                                </div>
                            </div>
                        </div>
                        <div class="post-main-view">
                            <div class="post-lead-image wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".6s">
                                @if($article["detail_picture"])
                                    <img src="{{$article["detail_picture"]}}" class="img-responsive" alt="{{$article["name"]}}">
                                @endif
                            </div>

                            <div class="post-description wow  fadeIn  " data-wow-duration="0.2s" data-wow-delay=".1s">
                                {{ $article["detail_text"]}}

                            </div>
                        </div>

                        <p><br/><a href="{{ url('/blog/') }}" class="link">Назад</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection