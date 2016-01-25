<div id="buy_in_one_click" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Купить в 1 клик:</h3>
            </div>
            <div id="thanks_buy_one_click" class="alert alert-success" style="display: none;">Спасибо! Наш менеджер свяжется с вами в течении 1 часа</div>
            <form id="buy_in_one_click_form" action="/ajax/buy_one_click.php" method="post" class="modal-body" role="form">
                <input type="hidden" name="buy_in_one_click[product_id]" value="" id="buy_in_one_click_product_id"/>
                <div class="form-group">
                    <input class="form-control required" type="text" placeholder="Ваше имя" name="buy_in_one_click[name]" required="required">
                </div>
                <div class="form-group">
                    <input class="form-control required" type="text" placeholder="Ваш телефон" name="buy_in_one_click[phone]" id="buy_one_click_phone" required="required">
                </div>
                <div class="modal-footer">
                    <button id="buy_in_one_click_submit_btn" class="btn btn-default" type="submit" title="Отправить">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>