<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="container">
  <div class="row">
	<div class="col-md-12">
		<div class="detail">
			<h1><?=$arResult["NAME"];?></h1>
			<p><img src='<?=$arItem["PREVIEW_PICTURE"]["src"];?>' alt='<?=$arItem["NAME"];?>' /></p>
			<p><?=$arItem["CREATED_BY"];?></p>
			<p><?=$arItem["DATE_CREATE"];?></p>
			<p><?=$arItem["PREVIEW_TEXT"];?></p>
		</div>
	</div>
</div>
</div>