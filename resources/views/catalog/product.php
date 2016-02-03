<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);

?>
<div class="row transitionfx" itemscope itemtype="http://schema.org/Product" id="product_card_container" data-product-id="<?= $arResult["ID"]; ?>">

    <div class="col-lg-6 col-md-6 col-sm-6">

        <div class="main-image sp-wrap col-lg-12 no-padding style2 style2look2">
            <? $i = 0; foreach($arResult["PHOTOS"] as $arPhoto): if ($i < 4) { $i++; } else {continue;}?>
                <a href="<?= $arPhoto["BIG"]; ?>">
                    <img itemprop="image" src="<?= $arPhoto["SMALL"]; ?>" class="img-responsive" alt="<?= $arResult["NAME"]; ?>">
                </a>
            <? endforeach; ?>
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-5">
        <div class="product-code">Артикул товара : <?= $arResult["ID"]; ?></div>

        <h1 class="product-title" itemprop="name"> <?= $arResult["NAME"]; ?></h1>
        <div class="brand-name-in-product-card"><a href="<?= $arResult["BRAND_LINK"]; ?>"><?= $arResult["BRAND_NAME"]; ?></a></div>
        <br/>
        <? foreach($arResult["PRICES"] as $arPrice): ?>
            <div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <? if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): ?>
                    <meta itemprop="price" content="<?= $arPrice["DISCOUNT_VALUE"]; ?>">
                    <meta itemprop="priceCurrency" content="<?= $arPrice["CURRENCY"]; ?>">
                    <span class="price-sales"> <?= $arPrice["PRINT_DISCOUNT_VALUE"]; ?></span>
                    <span class="price-standard"><?= $arPrice["PRINT_VALUE"]; ?></span>
                <? else: ?>
                    <meta itemprop="price" content="<?= $arPrice["VALUE"]; ?>">
                    <meta itemprop="priceCurrency" content="<?= $arPrice["CURRENCY"]; ?>">
                    <span class="price-sales"> <?= $arPrice["PRINT_VALUE"]; ?></span>
                <? endif ?>
            </div>
        <? endforeach; ?>


        <? if (!empty($arResult["PROPERTIES"]["SIZE"]["VALUE"])): ?>
            <div class="productFilter productFilterLook2">
                <div class="filterBox">
                    <p class="quantity-span">Размер:</p>
                    <? $sizeSelected = false; $arResult["CAN_BUY"] = false; ?>
                    <select name="size" id="size_<?= $arResult["ID"]; ?>">
                        <? foreach($arResult["PROPERTIES"]["SIZE"]["VALUE"] as $key => $val): ?>
                            <? if ($arResult["PROPERTIES"]["SIZE"]["DESCRIPTION"][$key] > 0):
                                $arResult["CAN_BUY"] = true;
                                ?>
                                <option data-max-quantity="<?= $arResult["PROPERTIES"]["SIZE"]["DESCRIPTION"][$key]; ?>" value="<?= $val; ?>" <? if(!$sizeSelected): $sizeSelected = 1; ?>selected="selected"<? endif; ?>><?= $val; ?></option>
                            <? endif ?>
                        <? endforeach; ?>
                    </select>
                    <? if (in_array($arResult["ID"], array(327, 328, 358, 359, 360, 361, 362, 363, 356, 357))): ?>
                        <strong><a href="#myModalSizes" data-toggle="modal" data-target="#myModalSizes" style="font-size: 16px;">Как выбрать размер?</a></strong>
                    <? endif ?>
                </div>
            </div>
        <? endif ?>
        <!-- productFilter -->

        <div class="cart-actions">
            <div class="addto">
                <button class="button btn-cart cart first add_to_cart" data-product-id="<?= $arResult["ID"]; ?>"
                        title="Купить" type="button" data-in-cart-text="В корзине">Купить
                </button>
                <div class="callback">
                    <button type="button" data-target="#buy_in_one_click" class="button spec-grey" data-toggle="modal" data-product-id="<?= $arResult["ID"]; ?>">Перезвоните мне</button>
                </div>
            </div>

            <div style="clear:both"></div>
            <? if ($arResult["CAN_BUY"]): ?>
                <h3 class="incaps"><i class="fa fa fa-check-circle-o color-in"></i> Есть в наличии</h3>
            <? else: ?>
                <h3 class="incaps"><i class="fa fa-minus-circle color-out"></i> Нет в наличии</h3>
            <? endif ?>


        </div>
        <div class="details-description" itemprop="description">
            <div><?= $arResult["DETAIL_TEXT"]; ?></div>
        </div>
        <div class="clear"></div>

        <div class="product-tab w100 clearfix" itemprop="description">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Доставка</a></li>
                <li><a href="#size" data-toggle="tab">Возврат</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    <br/>
                    <p>Бесплатная по Москве и Санкт-Петербургу. <br/>О доставке в другие регионы читайте на странице <a href="/about/delivery/"><b>правила доставки</b></a></p>

                </div>
                <div class="tab-pane" id="size">
                    <p>Если вещь вам не подойдет или не понравится, то, при условии сохранения потребительских свойств и товарного вида, вы сможете без труда вернуть
                        ее нам в течение 14 дней после покупки.<br/> <a href="/about/refund/"><b>Подробнее о возврате</b></a></p>
                </div>


            </div>

        </div>


        <div class="product-share clearfix">
            <p> Поделиться </p>

            <div class="socialIcon">
                <div class="addthis_sharing_toolbox"></div>
            </div>
        </div>

    </div>

</div>
<? if (in_array($arResult["ID"], array(327, 328, 358, 359, 360, 361, 362, 363))): // Plan B Jeans ?>
    <div id="myModalSizes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                    <h3 class="modal-title-site text-center"> Таблица размеров </h3>
                </div>
                <div class="modal-body">
                    <img src="/images/plan_b_jeans.jpg" class="img-responsive">
                    <div class="text-center">
                        <a href="/images/plan_b_jeans.jpg" target="_blank" class="btn btn-primary">Открыть в полном размере</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif ?>
<? if (in_array($arResult["ID"], array(356, 357))): // Tokio, Kioto ?>

    <div id="myModalSizes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> × </button>
                    <h3 class="modal-title-site text-center"> Таблица размеров </h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover">
                        <tr class="active">
                            <th scope="row">Размер</th>
                            <td>Объем Груди</td>
                            <td>Объем Талии</td>
                            <td>Объем Бедер</td>
                            <td>Длина рукава</td>
                            <td>Ширина рукава</td>
                            <td>Длина изделия</td>
                        </tr>
                        <? foreach($arResult["SIZES_PROPERTIES"] as $row): ?>
                            <tr>
                                <td><?= $row[0]; ?></td>
                                <td><?= $row[1]; ?></td>
                                <td><?= $row[2]; ?></td>
                                <td><?= $row[3]; ?></td>
                                <td><?= $row[4]; ?></td>
                                <td><?= $row[5]; ?></td>
                                <td><?= $row[6]; ?></td>
                            </tr>
                        <? endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<? endif ?>
<script type="text/javascript">
    $(function() {
        function centerModal() {
            $(this).css('display', 'block');
            var $dialog = $(this).find("#myModalSizes .modal-dialog");
            var offset = ($(window).height() - $dialog.height()) / 2;
            // Center modal vertically in window
            $dialog.css("margin-top", offset);
        }

        $('#myModalSizes').on('show.bs.modal', centerModal);
        $(window).on("resize", function () {
            $('#myModalSizes:visible').each(centerModal);
        });
    });
</script>