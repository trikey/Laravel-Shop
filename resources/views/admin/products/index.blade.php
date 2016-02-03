@extends('admin')

@section('content')
<h1>Товары каталога</h1>
@include('admin/_partials/menu')

<a class="btn btn-primary btn-xs admin_add" href="{{ url("admin/products/create") }}" data-title="Редактировать"><span class="glyphicon glyphicon-plus"></span> Добавить</a>

@if($products)
<div class="row">
    <div class="col-md-12">
        <h4>Список товаров каталога</h4>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <th><input type="checkbox" id="checkall" /></th>
                    <th>Название</th>
                    <th>Ред.</th>
                    <th>Удалить</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td>{{ $product->name }}</td>
                        <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs admin_edit" href="{{ url("admin/products/$product->id/edit") }}" data-title="Редактировать"><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                        <td>
                            {!! Form::open(array('url' => "admin/products/$product->id", 'method' => 'delete')) !!}
                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <button type="submit" class="btn btn-danger btn-xs admin_delete" data-title="Удалить">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </p>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="clearfix"></div>
            {!! $products->render() !!}
        </div>
    </div>
</div>
@endif
@endsection