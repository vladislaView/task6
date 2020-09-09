<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="contact-form">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>
<div class="contact-form__head">
        <div class="contact-form__head-title">Связаться</div>
        <div class="contact-form__head-text">Наши сотрудники помогут выполнить подбор услуги и&nbsp;расчет цены с&nbsp;учетом
            ваших требований
        </div>
	</div>
	
<form class="contact-form__form" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>
<div class="contact-form__form-inputs">
	<div class="mf-name">
		<div class="input contact-form__input">
			<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span >*</span><?endif?>
		</div>
		<input class="input__input" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
		<div class="input__notification">Поле должно содержать не менее 3-х символов</div>		
	</div>
	<div class="input contact-form__input">
		<div class="input contact-form__input">
			<?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span >*</span><?endif?>
		</div>
		<input class="input__input" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
		<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
	</div>
	<div class="input contact-form__input">
		<div class="input contact-form__input">
			<?=GetMessage("MFT_PHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?><span class="input__label-text">*</span><?endif?>
		</div>
		<input class="input__input" type="text" name="user_phone" value="<?=$arResult["PHONE"]?>">
		<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
	</div>
	<div class="input contact-form__input">
		<div class="input contact-form__input">
			<?=GetMessage("MFT_COMPANY")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("COMPANY", $arParams["REQUIRED_FIELDS"])):?><span >*</span><?endif?>
		</div>
		<input class="input__input" type="text" name="user_company" value="<?=$arResult["COMPANY"]?>">
		<div class="input__notification">Поле должно содержать не менее 3-х символов</div>
	</div>
	</div>
	<div class="contact-form__form-message">
		<div class="input contact-form__input">
			<?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span >*</span><?endif?>
		</div>
		<textarea class="input__input" name="MESSAGE" rows="5" cols="40"><?=$arResult["MESSAGE"]?></textarea>
		<div class="input__notification"></div>
	</div>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="input__label-text">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
	<div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
	
	<input class="form-button__title" type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>
</div>