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
    {!! Form::input('date', 'active_from', isset($product) ? $product->active_from ? $product->active_from->format('Y-m-d') : null : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Окончание активности') !!}
    {!! Form::input('date', 'active_till', isset($product) ? $product->active_till ? $product->active_till->format('Y-m-d') : null : null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Сортировка') !!}
    {!! Form::text('sort', null, array('placeholder'=>'500', 'class' => 'form-control')) !!}
</div>
<div class="form-group">
    @if(isset($product) && isset($product->preview_picture) && file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/".$product->preview_picture))
        <img src="/uploads/{{ $product->preview_picture }}" width="200" alt="{{ $product->name }}"><br>
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
    @if(isset($product) && isset($product->detail_picture) && file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/".$product->detail_picture))
        <img src="/uploads/{{ $product->detail_picture }}" width="200" alt="{{ $product->name }}"><br>
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
    {!! Form::label('Категория') !!}
    {!! Form::select('parent_id', $sections, null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('Бренд') !!}
    {!! Form::select('brand_id', $brands, null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('is_new_product', 1, false) !!} <b>Новинка</b>
        </label>
    </div>
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('is_sale_leader', 1, false) !!} <b>Лидер продаж</b>
        </label>
    </div>
</div>