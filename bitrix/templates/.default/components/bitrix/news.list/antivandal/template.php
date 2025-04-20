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

$item = $arResult['ITEMS'][0]
?>
<?php if(!empty($arResult['ITEMS'])): ?>
				<div class="hero-products__top _container">
								<div class="bread">
												<a href="index.html">Главная</a>
												<p>Продукция COMFORUM</p>
								</div>
								<h1 class="title"><?= $item['PROPERTIES']['title']['VALUE'] ?> <span><?= $item['PROPERTIES']['title_red']['VALUE'] ?></span></h1>
				</div>
				<div class="hero-products__main">
								<div class="hero-products__bg">
												<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
								</div>
								<div class="hero-products__content hero-products__content_7">
												<div class="_container">
																<div class="hero-products__row">
																				<div class="hero-products__left">
																								<div class="hero-products__sub"><?= $item['PROPERTIES']['title_second']['VALUE']['TEXT'] ?></div>
																				</div>
																				<div class="hero-products__text">
																								<p><?= $item['PREVIEW_TEXT'] ?></p>
																				</div>
																</div>
												</div>
								</div>
				</div>
				<button class="hero__down" data-goto=".products"></button>
				</section>
<?php endif; ?>