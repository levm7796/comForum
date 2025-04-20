<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//echo '<pre>';
//print_r($arResult['PROPERTIES']['configurations']['VALUE']);
//echo '</pre>';
$configIds = $arResult['PROPERTIES']['configurations']['VALUE'];
$imgIds = $arResult['PROPERTIES']['variant_pictures']['VALUE'];

$arSelect = Array("NAME", "PREVIEW_TEXT", "PROPERTY_ICON");
$arFilter = Array("IBLOCK_ID"=> 9, "ID"=> $configIds, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "!=PROPERTY_SIZE_VALUE" => "instagram");
$res = CIBlockElement::GetList(Array("DESC" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$configElements = [];
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arFields['icon'] = CFile::GetByID($arFields['PROPERTY_ICON_VALUE']);
    $arFields['icon'] = $arFields['icon']->arResult[0];
    $configElements[] = $arFields;
}

foreach ($imgIds as $id) {
    $res = CFile::GetByID($id);
    $variantPictures[] = $res->arResult[0]['SRC'];
}

$optionPicture = CFile::GEtById($arResult['PROPERTIES']['opt_picture']['VALUE'])->arResult[0]['SRC']
//echo '<pre>';
//print_r($variantPictures);
//echo '</pre>';
?>
<?php if(!empty($arResult['ID'])): ?>
    <section class="product">
        <div class="_container">
            <div class="product__row">
                <div class="product__left">
                    <div class="product__bg">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/product/bg.png" alt="" title="">
                    </div>
                    <div class="product__img">
                        <img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" alt="" title="">
                    </div>
                </div>
                <div class="product__right">
                    <div class="product__main">
                        <div class="product-blocktitle" data-da="product__img,0,700">
                            <div class="product-blocktitle__block">
                                <h1 class="title product__title"><?= $arResult['PROPERTIES']['detail_name']['VALUE'] ?></h1>
                                <div class="product__sku"><?= $arResult['DETAIL_TEXT'] ?></div>
                            </div>
                            <div class="product__type"><?= $arResult['PROPERTIES']['detail_type']['VALUE'] ?></div>
                        </div>
                        <div class="showmore">
                            <div data-showmore-content="320-55, 701-58" class="showmore__content text product__desc">
                                <?= html_entity_decode($arResult['PROPERTIES']['detail_description']['VALUE']['TEXT']) ?>
                            </div>
                            <button class="showmore__trigger">
                                <span>подробнее</span>
                                <span>Скрыть</span>
                            </button>
                        </div>
                        <div class="product-var">
                            <h4>коллекции оБивки</h4>
                            <div class="product-var__row">
                                <div class="product-var__block">
                                    <button class="product-var__img">
                                        <img src="img/product/m1.png" alt="" title="">
                                    </button>
                                    <button class="product-var__img">
                                        <img src="img/product/m2.png" alt="" title="">
                                    </button>
                                    <button class="product-var__img">
                                        <img src="img/product/m3.png" alt="" title="">
                                    </button>
                                </div>
                                <a href="colors.html?select=5" class="btn product__btn">все коллекции</a>
                            </div>
                        </div>
                        <div class="product-var">
                            <h4>Цвет каркаса</h4>
                            <div class="product-var__row">
                                <div class="product-var__block">
                                    <button class="product-var__color product-var__color_bl"></button>
                                    <button class="product-var__color product-var__color_g"></button>
                                    <button class="product-var__color product-var__color_r"></button>
                                    <button class="product-var__color product-var__color_gr"></button>
                                    <button class="product-var__color product-var__color_w"></button>
                                </div>
                                <a href="colors.html?select=2" class="btn product__btn">все цвета</a>
                            </div>
                        </div>
                        <div class="quantity" data-da="product__btnda,0,700">
                            <div class="quantity__button quantity__button_minus"></div>
                            <div class="quantity__input">
                                <input autocomplete="off" type="text" name="form[]" value="1">
                            </div>
                            <div class="quantity__button quantity__button_plus"></div>
                        </div>
                        <div class="product-info">
                            <div class="product-info__row">
                                <div class="product-info__request">
                                    <button data-popup="#cad"><span class="icon-09"></span><b>ЗАПРОСИТЬ</b> BIM/CAD</button>
                                    <button data-popup="#price2"><span class="icon-24"></span><b>ЗАПРОСИТЬ</b> ПРАЙС</button>
                                </div>
                                <div class="product-info__block">
                                    <div class="product-info__prices">
                                        <div class="product-info__price">Розница: <span><?= $arResult['PROPERTIES']['retail']['VALUE'] ?> р.*</span></div>
                                        <div class="product-info__price">Опт: <span>по запросу</span></div>
                                    </div>
                                    <div class="product__btnda">
                                        <div class="btn2 product__btn2">
                                            <a href="#" data-popup="#popcart" class="btn" target="_blank">ЗАКАЗАТЬ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__note">
                                <?= html_entity_decode($arResult['PROPERTIES']['ps_description']['VALUE']['TEXT']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="product-details">
        <div class="_container">
            <h3 class="product-details__title">ХАРАКТЕРИСТИКА</h3>
            <div class="product-details__row">
                <div class="product-details__left">
                    <div class="product-details__type"><?= $arResult['PROPERTIES']['detail_type']['VALUE'] ?> <span><?= $arResult['PROPERTIES']['detail_name']['VALUE'] ?></span></div>
                    <div class="product-details__img">
                        <img src="<?= $optionPicture ?>" alt="" title="">
                    </div>
                </div>
                <div class="product-details__right">
                    <div class="table">
                        <div class="table__line">
                            <div class="table__name">Артикул</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_articul']['VALUE'] ?></div>
                        </div>
                        <div class="table__line">
                            <div class="table__name">Размер модели</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_size']['VALUE'] ?></div>
                        </div>
                        <div class="table__line">
                            <div class="table__name">Конструкция</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_construction']['VALUE'] ?></div>
                        </div>
                        <div class="table__line">
                            <div class="table__name">Материал каркаса</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_materials']['VALUE'] ?></div>
                        </div>
                        <div class="table__line">
                            <div class="table__name">Материал спинки и сиденья</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_materials_other']['VALUE'] ?></div>
                        </div>
                        <div class="table__line">
                            <div class="table__name">Вес</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_height']['VALUE'] ?></div>
                        </div>
                        <div class="table__line">
                            <div class="table__name">Поставка /упаковка</div>
                            <div class="table__value"><?= $arResult['PROPERTIES']['opt_delivery']['VALUE'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mod-slider _container">
        <h3 class="mod-slider__title"><span>Модификации</span> Многоместной секции <b><?= $arResult['NAME'] ?></b></h3>
        <div class="swiper mod-slider__container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="mod-slider__img">
                        <img src="img/product/1.png" alt="" title="">
                    </div>
                    <div class="mod-slider__info">
                        <div class="mod-slider__name">Многоместная секция <b>AERO PU МС8</b></div>
                        <div class="mod-slider__mod">с ППУ накладками</div>
                    </div>
                    <div class="mod-slider__pic">
                        <img src="img/product/p2.png" alt="" title="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="mod-slider__img">
                        <img src="img/product/1.png" alt="" title="">
                    </div>
                    <div class="mod-slider__info">
                        <div class="mod-slider__name">Многоместная секция <b>AERO PU МС8</b></div>
                        <div class="mod-slider__mod">с ППУ накладками</div>
                    </div>
                    <div class="mod-slider__pic">
                        <img src="img/product/p2.png" alt="" title="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="mod-slider__img">
                        <img src="img/product/1.png" alt="" title="">
                    </div>
                    <div class="mod-slider__info">
                        <div class="mod-slider__name">Многоместная секция <b>AERO PU МС8</b></div>
                        <div class="mod-slider__mod">с ППУ накладками</div>
                    </div>
                    <div class="mod-slider__pic">
                        <img src="img/product/p2.png" alt="" title="">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="mod-slider__img">
                        <img src="img/product/1.png" alt="" title="">
                    </div>
                    <div class="mod-slider__info">
                        <div class="mod-slider__name">Многоместная секция <b>AERO PU МС8</b></div>
                        <div class="mod-slider__mod">с ППУ накладками</div>
                    </div>
                    <div class="mod-slider__pic">
                        <img src="img/product/p2.png" alt="" title="">
                    </div>
                </div>
            </div>
        </div>
        <div class="button-prev swiper-button-prev6"></div>
        <div class="button-next swiper-button-next6"></div>
    </section>
    <section class="productvar">
        <div class="_container">
            <div class="productvar__da"></div>
            <div class="productvar__row">
                <div class="productvar-slider">
                    <div class="swiper productvar-slider__container">
                        <div class="swiper-wrapper">
                            <? foreach ($variantPictures as $imgSrc): ?>
                                <div class="swiper-slide">
                                    <img src="<?= $imgSrc ?>" alt="" title="">
                                </div>
                            <? endforeach ?>
                        </div>
                    </div>
                    <div class="button-prev swiper-button-prev7"></div>
                    <div class="button-next swiper-button-next7"></div>
                </div>
                <div class="productvar__right">
                    <h3 class="productvar__title" data-da="productvar__da,0,820"><span>Варианты</span> Комплек&shy;тации мебели</h3>
                    <div class="productvar__items">
                        <? foreach($configElements as $item): ?>
                            <div class="productvar-item">
                                <div class="productvar-item__block">
                                    <div class="productvar-item__icon">
                                        <img src="<?= $item['icon']['SRC'] ?>" alt="" title="">
                                    </div>
                                    <div class="productvar-item__name"><?= $item['NAME'] ?></div>
                                    <div class="productvar-item__text"><?= $item['PREVIEW_TEXT'] ?></div>
                                </div>
                            </div>
                        <? endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blockform">
        <div class="_container">
            <div class="blockform__row">
                <div class="blockform__img">
                    <img src="img/blockform/1.webp" alt="" title="">
                </div>
                <form action="" id="form" method="post" class="blockform-form">
                    <h3 class="blockform__title">Заполните форму <span>и ваш персональный менеджер <br>свяжется с вами</span></h3>
                    <div class="form__item">
                        <input id="name" autocomplete="off" type="text" name="name" data-error="Введите имя" placeholder="Ваше имя*" data-placeholder data-validate data-required="name" class="input">
                    </div>
                    <div class="form__row">
                        <div class="form__item form__item_num">
                            <select name="form[]" data-scroll="200" class="form">
                                <option value="1" selected>+7</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                            </select>
                        </div>
                        <div class="form__item">
                            <input id="tel" autocomplete="off" type="text" name="tel" data-error="Введите правильно телефон" placeholder="Введите телефон" data-placeholder data-validate class="input">
                        </div>
                    </div>
                    <div class="blockform-form__block">
                        <ul>
                            <li>Выгодные оптовые поставки</li>
                            <li>Высокое качество продукции</li>
                            <li>Современный дизайн</li>
                        </ul>
                        <div class="blockform-del">
                            <h4>Доставка по всей России</h4>
                            <div class="blockform-del__row">
                                <div class="blockform-del__col">
                                    <p>Доставка в пункты самовывоза или прямо до вашей двери от 3х дней</p>
                                </div>
                                <div class="blockform-del__col">
                                    <p>Работаем в будни:</p>
                                    <p>Офис — с 8:00 до 17:00</p>
                                    <p>Склад — с 8:30 до 16:00</p>
                                </div>
                                <div class="blockform-del__col">
                                    <p>Если вы не хотите ждать, позвоните нам сами!</p>
                                    <a href="tel:+7 495 662-56-30">+7 495 662-56-30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blockform-form__agree">Нажимая кнопку, вы даете согласие на обработку персональных данных</div>
                    <div class="btn2">
                        <button type="submit" name=submit class="btn btn_bl">оставить заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php endif; ?>