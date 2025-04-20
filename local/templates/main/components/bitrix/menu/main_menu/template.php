<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
\Bitrix\Main\Loader::includeModule('iblock');
?>
<?php
$getIBlockById = function ($iblock_id) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_IMAGE", "PROPERTY_LINK");
    $arFilter = Array("IBLOCK_ID"=> $iblock_id, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array("DESC" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    $elements = [];
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arFields['img'] = CFile::GetByID($arFields['PROPERTY_IMAGE_VALUE']);
        $arFields['img'] = $arFields['img']->arResult[0];
        $elements[] = $arFields;
    }
    return $elements;
};
$current = null;
$arSelect = Array("PREVIEW_TEXT");
$arFilter = Array("IBLOCK_ID"=> 4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("DESC" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$number = [];
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $number[] = $arFields;
}
$number = $number[0]['PREVIEW_TEXT'];
//echo '<pre>';
//print_r($number);
//echo '</pre>';
?>

<?if (!empty($arResult)):?>
<nav class="header__menu">
    <ul class="menu">
        <? foreach($arResult as $item): ?>
                <?php
                if(str_contains($item['LINK'], "about")) $current = $getIBlockById(1);
                if(str_contains($item['LINK'], "production")) $current = $getIBlockById(2);
                if(str_contains($item['LINK'], "resources")) $current = $getIBlockById(3);
                ?>
            <li class="<? if(!is_null($current)): ?>_arrow <? endif; ?> icon-14"><a href="<?= $item['LINK'] ?>"><span><?= $item['TEXT'] ?></span></a>

                <? if(!is_null($current)): ?>
                    <ul class="sub-menu" hidden>
                        <? foreach($current as $arItem):?>
                            <li><a href="<?=$arItem["PROPERTY_LINK_VALUE"]?>"><? if(isset($arItem['img']['SRC']) && !is_null($arItem['img']['SRC'])):?><img src="<?= $arItem['img']['SRC'] ?>" alt="" title=""><? endif ?><?=$arItem["NAME"]?></a></li>
                        <?endforeach?>
                    </ul>
                <? endif; ?>
            </li>
        <?php $current = null ?>
        <? endforeach ?>
        <li class="mob-contacts">
            <a href="tel:<?= $number ?>"><?= $number ?></a>
        </li>
    </ul>
</nav>

<!--    --><?//foreach($menuProductionElements as $arItem):?>
<!--    <img src="--><?//= $arItem['img']['SRC'] ?><!--" alt="">-->
<!--        <h1>--><?//= $arItem['NAME'] ?><!--</h1>-->
<!--    --><?//endforeach?>
<? endif ?>

<?php
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
//?>