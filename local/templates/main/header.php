<?
 if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
     die();
 ?>

 <?
 $curlPage = $GLOBALS['APPLICATION']->GetCurPage(false)
 ?>
 <!DOCTYPE html>
 <html lang="ru">
 <head>
     <?$APPLICATION->ShowHead();?>
     <meta name="description" content="">
     <!--    <meta charset="UTF-8">-->
     <meta name="format-detection" content="telephone=no">
     <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/style.css?71">
     <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/assets/favicon.ico">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">	</head>
 <body>
 <?$APPLICATION->ShowPanel();?>
 <div class="wrapper">
     <main class="page"<? if(str_contains($curlPage, "antivandal")):?> style="background: #f6f6f7" <? endif ?>>
<!--///////-->
<? if($curlPage==SITE_DIR): ?>
         <section class="hero">
             <div class="hero__bg">
                 <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/hero/bg.webp" alt="" title="">
             </div>
             <div class="hero__content">
<? endif ?>
<!--///////-->
<? if(str_contains($curlPage, "product")):?>
                         <div class="blockhead">
<? endif ?>
<? if(str_contains($curlPage, "antivandal")):?>
                         <section class="hero-products">
<? endif ?>
<!--///////-->
                 <header class="header">
                     <div class="_container">
                         <div class="header__row">
                             <div class="header__wrap">
                                 <a href="index.html" class="header__logo">
                                     <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.svg" alt="" title="">
                                 </a>
                                 <?$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
                                     "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                                     "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                                     "DELAY" => "N",	// Откладывать выполнение шаблона меню
                                     "MAX_LEVEL" => "2",	// Уровень вложенности меню
                                     "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                         0 => "",
                                     ),
                                     "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                                     "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                                     "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                                     "ROOT_MENU_TYPE" => "main",	// Тип меню для первого уровня
                                     "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                                 ),
                                     false
                                 );?>
                                 <div class="header__toggle block-click-toggle" data-target-el="header">
                                     <span>Меню</span>
                                     <div class="header__togglebtn"></div>
                                 </div>
                             </div>
                             <div class="header-block block-click-off" data-target-el="header">
                                 <form action="" id="header-search" method="post" class="header-search">
                                     <input id="search-inp" autocomplete="off" type="text" name="search-inp" placeholder="Поиск..." class="input">
                                     <div class="header-search__icon"></div>
                                 </form>
                                 <a href="cart.html" class="header-cart _active">
                                     <span class="header-cart__icon"></span>
                                     <span class="header-cart__val">10</span>
                                 </a>
                                 <a href="#" class="header__tel" data-da="mob-contacts,0,1024" data-popup="#callback"></a>
                             </div>
                         </div>
                     </div>
                 </header>
<? if(str_contains($curlPage, "product")):?>
</div>
<? endif ?>