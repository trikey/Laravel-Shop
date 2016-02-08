@extends('admin')

@section('content')
<h1>Редактировать платежную систему</h1>
@include('admin/_partials/menu')


{!! Form::model($paySystem,
    array(
        'class' => 'form',
        'novalidate' => 'novalidate',
        'files' => true,
        'method' => 'put'
        )) !!}


@include('admin/payment/_form')



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