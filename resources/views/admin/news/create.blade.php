@extends('admin')

@section('content')
<h1>Добавить новость</h1>
@include('admin/_partials/menu')


{!! Form::open(
    array(
        'class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

<div class="form-group">
    {!! Form::label('Product Name') !!}
    {!! Form::text('name', null, array('placeholder'=>'Chess Board', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Product Code') !!}
    {!! Form::text('code', null, array('placeholder'=>'code', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Product Image') !!}
    {!! Form::file('preview_picture', null) !!}
</div>

<div class="form-group">
    {!! Form::submit('Create Product!', array('class' => 'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@endsection