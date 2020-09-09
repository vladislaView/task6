<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>

<div class="article-card">
    
    <div class="article-card__title"><?=$arResult["NAME"]?></div>
    <div class="article-card__date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
    <div class="article-card__content">

        <div class="article-card__image sticky"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-object-fit="cover"></div>
		
        <div class="article-card__text">
            <div class="block-content" data-anim="anim-3"><?=$arResult["DETAIL_TEXT"]?></div>
			<a class="article-card__button" href="/novostnoy/">Назад к новостям</a>
		</div>
    </div>
</div>