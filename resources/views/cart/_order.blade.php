<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row userInfo">
            <div class="col-xs-12 col-sm-12">
                <div class="w100 clearfix">
                    <div class="row userInfo">
                        <div class="col-lg-12">
                            <h2 class="block-title-2">Оформление заказа</h2>
                        </div>


                        {!! Form::open(array('novalidate' => 'novalidate')) !!}

                            <div id="order_form_content">

                                <div class="col-xs-12 col-sm-12 col-lg-7" id="sam_form">
                                    @foreach($orderProperties as$orderProperty)
                                        <div class="form-group required">
                                            {!! Form::label($orderProperty->code, $orderProperty->name) !!}
                                            {!! Form::text($orderProperty->code, null, array('placeholder'=>$orderProperty->name, 'class' => 'form-control')) !!}
                                        </div>
                                    @endforeach

                                    <h4>Служба доставки</h4>

                                    <div class="bx_block w100 vertical">
                                        <div class="form-group required">

                                            @foreach($delivery_systems as $index => $delivery)
                                                {!! Form::label('delivery_system', $delivery->name) !!}
                                                {!! Form::radio('delivery_system', $delivery->id, Input::old('delivery_system') == $delivery->id ? true : !$index ? true : false ) !!}
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="clear"></div>


                                    <h4>Платежная система</h4>

                                    <div class="bx_block w100 vertical">
                                        <div class="form-group required">
                                            @foreach($pay_systems as $index => $pay_system)
                                                {!! Form::label('pay_system', $pay_system->name) !!}
                                                {!! Form::radio('pay_system', $pay_system->id, Input::old('pay_system') == $pay_system->id ? true : !$index ? true : false) !!}
                                            @endforeach
                                        </div>
                                    </div>

                                    {!! Form::submit('Оформить заказ', array('class' => 'btn btn-primary btn-small')) !!}

                                </div>
                                <div class="col-lg-3 col-xs-12 col-sm-12">
                                    @if(!empty($errors->all()))
                                        <br/>
                                        <h2>Ошибка!</h2>
                                        <ul class="text-danger">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                            </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">

    </div>

</div>