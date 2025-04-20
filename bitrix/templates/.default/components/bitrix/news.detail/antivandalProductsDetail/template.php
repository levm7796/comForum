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
?>
<?php if(!empty($arResult['ID'])): ?>
				<div class="products-items">
												<a class="products-item">
																<div class="products-item__row">
																				<div class="products-item__img">
																								<img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
																				</div>
																				<div class="products-item__name"><?= $arResult['NAME'] ?></div>
																				<div class="products-item__price"><?= $arResult['PREVIEW_TEXT'] ?> Р</div>
																</div>
												</a>
				</div>
<?php endif; ?>