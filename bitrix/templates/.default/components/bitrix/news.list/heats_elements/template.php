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

$products = $arResult['ITEMS'];
$productsNew = [];
$productsHeat = [];

foreach($products as $product) {
				if($product['PROPERTIES']['type']['VALUE'] == 'new') $productsNew[] = $product;
				if($product['PROPERTIES']['type']['VALUE'] == 'heat') $productsHeat[] = $product;
}
if (count($productsNew) > count($productsHeat)) {
				$count = count($productsNew);
} else {
    $count = count($productsHeat);
}

//echo '<pre>';
//print_r($arResult['ITEMS']);
//echo '</pre>';
?>
<?php if(!empty($arResult['ITEMS'])): ?>
<?php for($index = 0; $index < $count; $index++): ?>
				<div class="swiper-slide">
								<div class="hits-slider__group">
        <?php if(isset($productsNew[$index]) || isset($productsHeat[$index+1])): ?>
												<div class="hits-slider__item" style="background: #d5cdc1;">
																<div class="hot-item__com">ПРОДУКТЫ <span>COMFORUM</span></div>
																<a href="#" class="hits-slider__img">
																				<img src="<?= $productsNew[$index]['PREVIEW_PICTURE']['SRC'] ?? $productsHeat[$index+1]['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
																</a>
																<div class="hits-slider__content">
																				<div class="hits-slider__block hits-slider__block_1">
																								<div class="hot-item__label"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/icons/16.svg" alt="" title="">Новинка</div>
																								<a href="#" class="btn hot-item__btn hot-item__btn_hid">подробнеe</a>
																				</div>
																				<div class="hot-item__block">
																								<div class="hot-item__cat">
																												<p><?= $productsNew[$index]['PROPERTIES']['description']['VALUE'] ?? $productsHeat[$index+1]['PROPERTIES']['description']['VALUE']  ?></p>
																								</div>
																								<a href="#" class="hot-item__name"><?= $productsNew[$index]['NAME'] ?? $productsHeat[$index+1]['NAME'] ?></a>
																								<div class="hot-item__text">
																												<p><?= $productsNew[$index]['PREVIEW_TEXT'] ?? $productsHeat[$index+1]['PREVIEW_TEXT'] ?></p>
																								</div>
																								<a href="#" class="btn hot-item__btn hot-item__btn1">подробнеe</a>
																				</div>
																</div>
												</div>
								<?php endif; ?>
												<?php if(isset($productsHeat[$index]) || isset($productsNew[$index+1])): ?>
												<div class="hits-slider__item" style="background: #c5cfdb;">
																<div class="hot-item__com">ПРОДУКТЫ <span>COMFORUM</span></div>
																<a href="#" class="hits-slider__img">
																				<img src="<?= $productsHeat[$index]['PREVIEW_PICTURE']['SRC'] ?? $productsNew[$index+1]['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
																</a>
																<div class="hits-slider__content">
																				<div class="hits-slider__block">
																								<div class="hot-item__label"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/icons/42.svg" alt="" title="">Хит продаж</div>
																				</div>
																				<div class="hot-item__block">
																								<div class="hot-item__cat">
																												<p><?= $productsHeat[$index]['PROPERTIES']['description']['VALUE'] ?? $productsNew[$index+1]['PROPERTIES']['description']['VALUE'] ?></p>
																								</div>
																								<a href="#" class="hot-item__name"><?= $productsHeat[$index]['NAME'] ?? $productsNew[$index+1]['NAME'] ?></a>
																								<div class="hits-slider__block2">
																												<a href="#" class="btn hot-item__btn">подробнеe</a>
																												<div class="hot-item__text hot-item__text_sm">
																																<p><?= $productsHeat[$index]['PREVIEW_TEXT'] ?? $productsNew[$index+1]['PREVIEW_TEXT'] ?></p>
																												</div>
																								</div>
																				</div>
																</div>
												</div>
								<?php endif; ?>
								</div>
				</div>
				<?php endfor; ?>
<?php endif; ?>