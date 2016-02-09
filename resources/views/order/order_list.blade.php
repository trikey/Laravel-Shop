@extends('baus')

@section('content')
<link href="{{ asset('/assets/css/footable-0.1.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('/assets/css/footable.sortable-0.1.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('/assets/js/footable.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/js/footable.sortable.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
</script>
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
        <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Список заказов </span></h1>

        <div class="row userInfo">
            <div class="col-lg-12">
                <h2 class="block-title-2"> Ваш список заказов </h2>
            </div>
            <div class="col-xs-12 col-sm-12">
                <table class="footable">
                    <thead>
                    <tr>
                        <th data-class="expand" data-sort-initial="true"><span
                                title="table sorted by this column on load">Номер заказа</span></th>
                        <th data-hide="default"> Цена</th>
                        <th data-hide="default" data-type="numeric"> Дата</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><a href="/personal/order/{{ $order->id }}">{{ $order->id }}</a></td>
                            <td>{{ $order->total_price }} руб.</td>
                            <td data-value="{{ strtotime($order->created_at) }}">{{ $order->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 clearfix">
                <ul class="pager">
                    <li class="previous pull-right"><a href="/catalog"> <i class="fa fa-home"></i> Назад в магазин </a>
                    </li>
                    <li class="next pull-left"><a href="/personal"> &larr; Назад в личный кабинет</a></li>
                </ul>
            </div>
        </div>
        <!--/row end-->

    </div>
    <div class="col-lg-3 col-md-3 col-sm-5"></div>
</div>
<!--/row-->

<div style="clear:both"></div>
@endsection