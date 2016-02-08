<div class="form-group">
    {!! Form::label('Название') !!}
    {!! Form::text('name', null, array('placeholder'=>'name', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Символьный код') !!}
    {!! Form::text('code', null, array('placeholder'=>'code', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::hidden('active', '0') !!}
            {!! Form::checkbox('active', 1, true) !!} <b>Активность</b>
        </label>
    </div>
</div>
<div class="form-group">
    {!! Form::label('Сортировка') !!}
    {!! Form::text('sort', null, array('placeholder'=>'500', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('XML ID') !!}
    {!! Form::text('xml_id', null, array('placeholder'=>'', 'class' => 'form-control')) !!}
</div>