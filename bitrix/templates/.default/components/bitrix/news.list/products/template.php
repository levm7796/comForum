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
<?php if(!empty($arResult['ITEMS'])): ?>
												<div class="products-items">
																<?php foreach($arResult['ITEMS'] as $item): ?>
																<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="products-item">
																				<div class="products-item__row">
																								<div class="products-item__img">
																												<img src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="" title="">
																								</div>
																								<div class="products-item__name"><?= $item['NAME'] ?></div>
																								<div class="products-item__price"><?= $item['PREVIEW_TEXT'] ?> Р</div>
																								<div class="icon-31"></div>
																				</div>
																</a>
				<?php endforeach; ?>
												</div>
												<button class="btn btn_bl show__more" id="moreButton" data-value="<?= $APPLICATION->GetCurPageParam('more=1', array('more')) ?>">Показать ещё <span class="icon-1"></span></button>
								</div>
				</section>
<?php endif; ?>