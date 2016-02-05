<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row userInfo">
            <div class="col-xs-12 col-sm-12">
                <div class="w100 clearfix">
                    <div class="row userInfo">
                        <div class="col-lg-12">
                            <h2 class="block-title-2">Оформление заказа</h2>
                        </div>


                        <form action="/personal/order/make" method="POST" name="ORDER_FORM" id="ORDER_FORM"
                              enctype="multipart/form-data">
                            <input type="hidden" name="sessid" id="sessid" value="4e603919b09073cc11f9f82fb2dba251">

                            <div id="order_form_content">
                                <input type="hidden" name="PERSON_TYPE" value="1">
                                <input type="hidden" name="PERSON_TYPE_OLD" value="1">

                                <div class="col-xs-12 col-sm-12 col-lg-7" id="sam_form">
                                    <div class="form-group required">
                                        <label for="ORDER_PROP_LAST_NAME">Фамилия <sup>*</sup> </label>
                                        <input name="ORDER_PROP_1" type="text" class="form-control"
                                               id="ORDER_PROP_LAST_NAME" value="лорвыфпаор">
                                    </div>
                                    <div class="form-group required">
                                        <label for="ORDER_PROP_FIRST_NAME">Имя <sup>*</sup> </label>
                                        <input name="ORDER_PROP_22" type="text" class="form-control"
                                               id="ORDER_PROP_FIRST_NAME" value="dsfgsdfgsdfg">
                                    </div>
                                    <div class="form-group required">
                                        <label for="ORDER_PROP_EMAIL">E-Mail <sup>*</sup> </label>
                                        <input name="ORDER_PROP_2" type="text" class="form-control"
                                               id="ORDER_PROP_EMAIL" value="belitskii@gmail.com">
                                    </div>
                                    <div class="form-group required">
                                        <label for="ORDER_PROP_PHONE">Телефон <sup>*</sup> </label>
                                        <input name="ORDER_PROP_3" type="text" class="form-control"
                                               id="ORDER_PROP_PHONE" value="243234234">
                                    </div>
                                    <div class="form-group required">
                                        <label for="InputState">Местоположение <sup>*</sup> </label>

                                        <input size="40" name="ORDER_PROP_6_val" id="ORDER_PROP_6_val"
                                               value="Москва, Московская область, Россия"
                                               class="form-control search-suggest" type="text" autocomplete="off"
                                               onfocus="loc_sug_CheckThis(this, this.id);">
                                        <input type="hidden" name="ORDER_PROP_6" id="ORDER_PROP_6" value="129">


                                    </div>
                                    <div class="form-group required">
                                        <label for="ORDER_PROP_ADDRESS">Адрес доставки <sup>*</sup></label>
                                        <textarea rows="3" cols="26" name="ORDER_PROP_7" class="form-control"
                                                  id="ORDER_PROP_ADDRESS">dsfgdsfg</textarea>
                                    </div>


                                    <input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="">

                                    <div class="bx_section">
                                        <h4>Служба доставки</h4>

                                        <div class="bx_block w100 vertical">
                                        </div>

                                        <div class="clear"></div>
                                    </div>


                                    <h4>Платежная система</h4>


                                </div>

                            </div>
                            <input type="hidden" name="confirmorder" id="confirmorder" value="Y">
                            <input type="hidden" name="profile_change" id="profile_change" value="N">
                            <input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
                        </form>

                    </div>

                </div>


                <a class="btn btn-primary btn-small " href="#" onclick="submitForm('Y');">
                    Оформить заказ &nbsp; <i class="fa fa-arrow-circle-right"></i> </a>

            </div>
        </div>

    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">

    </div>

</div>