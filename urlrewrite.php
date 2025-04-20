<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/antivandal/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/antivandal/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/test.php',
    'SORT' => 100,
  ),
);
