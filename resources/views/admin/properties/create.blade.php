@extends('admin')

@section('content')
<h1>Добавить свойство заказа</h1>
@include('admin/_partials/menu')


{!! Form::open(
    array(
        'class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true)) !!}

@include('admin/properties/_form')




<div class="form-group">
    {!! Form::submit('Сохранить!', array('class' => 'btn btn-primary')) !!}
</div>
{!! Form::close() !!}


@if($errors)
    <ul class="text-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif



@endsection