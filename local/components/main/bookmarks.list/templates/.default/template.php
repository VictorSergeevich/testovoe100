<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="container">
  <div class="row">
	<div class="col-md-12">
		<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
		    <!-- Wrapper for slides -->
		    <div class='carousel-inner'>
				<? foreach($arResult["ITEMS"] as $key => $arItem){ ?>
		        <div class='carousel-item active'>
		        	<a href="<?=$arItem["DETAIL_PAGE_URL"];?>">
			            <img src='<?=$arItem["PREVIEW_PICTURE"]["src"];?>' alt='<?=$arItem["NAME"];?>' />
			            <p><?=$arItem["NAME"];?></p>
			            <p><?=$arItem["CREATED_BY"];?></p>
		        	</a>
		        </div>
				<? } ?>
		    </div>

		    <!-- Controls -->
		    <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
		        <span class='glyphicon glyphicon-chevron-left'></span>
		    </a>
		    <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
		        <span class='glyphicon glyphicon-chevron-right'></span>
		    </a>

		    <!-- Indicators -->
		    <ol class='carousel-indicators'>
		        <li data-target='#carousel-custom' data-slide-to='0' class='active'><img
		                src='http://placehold.it/100x50&text=slide1' alt='' /></li>
		        <li data-target='#carousel-custom' data-slide-to='1'><img src='http://placehold.it/100x50&text=slide2' alt='' />
		        </li>
		        <li data-target='#carousel-custom' data-slide-to='2'><img src='http://placehold.it/100x50&text=slide3' alt='' />
		        </li>
		    </ol>
		</div>
	</div>
</div>
</div>