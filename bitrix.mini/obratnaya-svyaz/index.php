<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Связаться");
?><?$APPLICATION->IncludeComponent(
	"code:main.feedback",
	"feedbackmyform",
	Array(
		"EMAIL_TO" => "bitrix.mini@bitrix.com",
		"EVENT_MESSAGE_ID" => array(),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array("NAME","EMAIL","MESSAGE, PHONE, COMPANY"),
		"USE_CAPTCHA" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>