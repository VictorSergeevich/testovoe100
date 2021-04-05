<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeComponent("main:bookmarks",".default", Array("AJAX_MODE" => "Y"));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>