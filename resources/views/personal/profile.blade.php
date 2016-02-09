@extends('baus')

@section('content')
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
        <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-user"></i> Личные данные </span></h1>
        <div class="row col-xs-12 col-sm-12">
                                </div>
        <div class="row userInfo">
            {!! Form::model($user,
                array(
                    'class' => 'form',
                    'novalidate' => 'novalidate',
                    'method' => 'put'
                    )) !!}
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="InputEmail"> Email </label>
                        {!! Form::label('Email') !!}
                        {!! Form::input('email', 'email', null, array('placeholder'=>'', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="InputPasswordCurrent"> Новый пароль </label>
                        {!! Form::label('Новый пароль') !!}
                        {!! Form::input('password', 'password', null, array('placeholder'=>'', 'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group required">
                        <label for="InputName">Имя</label>
                        {!! Form::label('Имя') !!}
                        {!! Form::text('name', null, array('placeholder'=>'', 'class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    @if($errors)
                        <ul class="text-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col-lg-12">
                    {!! Form::submit('Сохранить настройки профиля', array('class' => 'btn btn-primary')) !!}
                    {{--<button type="submit" class="btn   btn-primary"><i class="fa fa-save"></i> &nbsp; Сохранить настройки профиля</button>--}}
                </div>
            {!! Form::close() !!}
            <div class="col-lg-12 clearfix">
                <ul class="pager">
                    <li class="previous pull-right"><a href="/catalog/"> <i class="fa fa-home"></i> Продолжить покупки </a>
                    </li>
                    <li class="next pull-left"><a href="/personal/"> ← Назад в мой кабинет</a></li>
                </ul>
            </div>
        </div>
        <!--/row end-->

    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"></div>
</div>
@endsection