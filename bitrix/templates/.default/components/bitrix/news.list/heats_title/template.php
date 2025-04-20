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

$item = $arResult['ITEMS'][0];
?>
<?php if(!empty($item)): ?>
				<h3 class="title hits__title"><?= $item['NAME'] ?> <span><?= $item['PROPERTIES']['second_part']['VALUE'] ?></span></h3>
				<div class="hits__text">
								<p><?= $item['PREVIEW_TEXT'] ?></p>
				</div>
<?php endif; ?>