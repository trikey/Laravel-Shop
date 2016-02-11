@extends('baus')


@section('content')
    <h1>{{$brand->name}}</h1>
    @if ($brand->preview_picture)
        <img class="preview_picture img-responsive" border="0" src="/uploads/{{$brand->preview_picture}}" alt="{{$brand->name}}" title="{{$brand->name}}" style="max-width: 500px;">
    @endif
    <?= html_entity_decode($brand->preview_text); ?>

@endsection