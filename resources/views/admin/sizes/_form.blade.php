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
            {!! Form::checkbox('active', 1, true) !!} <b>Активность</b>
        </label>
    </div>
</div>
<div class="form-group">
    {!! Form::label('Начало активности') !!}
    {!! Form::input('date', 'active_from', isset($size) ? $size->active_from ? $size->active_from->format('Y-m-d') : null : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Окончание активности') !!}
    {!! Form::input('date', 'active_till', isset($size) ? $size->active_till ? $size->active_till->format('Y-m-d') : null : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Сортировка') !!}
    {!! Form::text('sort', null, array('placeholder'=>'500', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    @if(isset($size) && isset($size->preview_picture) && file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/".$size->preview_picture))
        <img src="/uploads/{{ $size->preview_picture }}" width="200" alt="{{ $size->name }}"><br>
        <div class="checkbox">
            <label>
                {!! Form::checkbox('delete_preview', 1, false) !!} <b>Удалить</b>
            </label>
        </div>
    @endif
    {!! Form::label('Картинка для анонса') !!}
    {!! Form::file('preview_picture', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Описание для анонса') !!}
    {!! Form::textarea('preview_text', null, array('class' => 'form-control', 'rows' => 3)) !!}
</div>
<div class="form-group">
    @if(isset($size) && isset($size->detail_picture) && file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/".$size->detail_picture))
        <img src="/uploads/{{ $size->detail_picture }}" width="200" alt="{{ $size->name }}"><br>
        <div class="checkbox">
            <label>
                {!! Form::checkbox('delete_detail', 1, false) !!} <b>Удалить</b>
            </label>
        </div>
    @endif
    {!! Form::label('Детальная картинка') !!}
    {!! Form::file('detail_picture', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Детальное описание') !!}
    {!! Form::textarea('detail_text', null, array('class' => 'form-control', 'rows' => 3)) !!}
</div>
<div class="form-group">
    {!! Form::label('XML ID') !!}
    {!! Form::text('xml_id', null, array('placeholder'=>'', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Meta Title') !!}
    {!! Form::text('meta_title', null, array('placeholder'=>'title', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Meta Keywords') !!}
    {!! Form::text('meta_keywords', null, array('placeholder'=>'keywords', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Meta Description') !!}
    {!! Form::textarea('meta_description', null, array('placeholder'=>'description', 'class' => 'form-control', 'rows' => 3)) !!}
</div>
<div class="form-group">
    {!! Form::label('Товар') !!}
    {!! Form::select('product_id', $products, null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Количество') !!}
    {!! Form::text('quantity', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Объем груди') !!}
    {!! Form::text('chest', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Талия') !!}
    {!! Form::text('waist', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Thigh') !!}
    {!! Form::text('thigh', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Длинна рукава') !!}
    {!! Form::text('sleeve_length', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Ширина рукава') !!}
    {!! Form::text('sleeve_width', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Длинна изделия') !!}
    {!! Form::text('length', null, array('class' => 'form-control')) !!}
</div>