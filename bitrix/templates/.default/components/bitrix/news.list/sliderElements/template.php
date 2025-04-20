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

$antivandal = [];
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_ICON", "PROPERTY_LINK", "PROPERTY_TITLE_FIRST", "PROPERTY_TITLE_SECOND",);
$arFilter = Array("IBLOCK_ID"=> 7, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("DESC" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $arFields['img'] = CFile::GetByID($arFields['PROPERTY_ICON_VALUE']);
    $arFields['img'] = $arFields['img']->arResult[0];
    $antivandal = $arFields;
}
//echo '<pre>';
//print_r($antivandal);
//echo '</pre>';
?>
<?php if(!empty($arResult)): ?>
    <div class="_container">
        <div class="hero__main">
            <div class="hero-slider">
                <div class="swiper hero-slider__container">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult['ITEMS'] as $item): ?>
                            <div class="swiper-slide">
                                <div class="hero-slider__img">
                                    <img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
                                </div>
                                <div class="hero-slider__block">
                                    <div class="hero-slider__text"><?= html_entity_decode($item['PREVIEW_TEXT']) ?></div>
                                    <div class="hero-slider__title"><?= $item['NAME'] ?></div>
                                    <a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="btn hero-slider__btn">Подробная информация</a>
                                </div>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <a href="<?= $antivandal['PROPERTY_LINK_VALUE'] ?>" class="hero__anti">
                <img src="<?= $antivandal['img']['SRC'] ?>" alt="" title="">
                <p><?= $antivandal['PROPERTY_TITLE_FIRST_VALUE'] ?> <span><?= $antivandal['PROPERTY_TITLE_SECOND_VALUE'] ?></span></p>
            </a>
        </div>
    </div>
    <button class="hero__down" data-goto=".products-main"></button>
    </div>
    </section>
<?php endif; ?>