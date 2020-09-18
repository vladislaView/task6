<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("TEST");

\Bitrix\Main\Loader::includeModule('iblock');
$row = 1;
$IBLOCK_ID = 3;

$el = new CIBlockElement;

?>

<? 
$rsProp = CIBlockPropertyEnum::GetList(
  ["SORT" => "ASC", "VALUE" => "ASC"],
  ['IBLOCK_ID' => $IBLOCK_ID]
);
while ($arProp = $rsProp->Fetch()) {
  $key = trim($arProp['VALUE']);
  $arProps[$arProp['PROPERTY_CODE']][$key] = $arProp['ID'];
}

if (($handle = fopen("parce.csv", "r")) !== false) {
  while (($data = fgetcsv($handle, 500, ",")) !== false) {
      if ($row == 1) {
          $row++;
          continue;
      }
      $row++;
      echo "1: ".$data[0]. "<br>";
      echo "2: ".$data[1]. "<br>";
      echo "3: ".$data[2]. "<br>";
      echo "4: ".$data[3]. "<br>";
      echo "5: ".$data[4]. "<br>";
      echo "6: ".$data[5]. "<br>";
      echo "7: ".$data[6]. "<br>";

      $PROP['prop_prim'] = $data[1];
      $PROP['prop_vn_numb'] = $data[2];
      $PROP['prop_kol'] = intval($data[4]);
      $PROP['prop_ed'] = $data[5];
      $PROP['prop_price'] = $data[6];
      
          if($PROP['prop_ed'] =='шт')
            $PROP['prop_ed'] = $arProps['prop_ed']['шт.'];
            
          if($PROP['prop_price'] =='договорная')
            $PROP['prop_price'] =  $arProps['prop_price']['договорная'];
            
        
        

      $arLoadProductArray = [
          "IBLOCK_ID" => $IBLOCK_ID,
          "PROPERTY_VALUES" => $PROP,
          "NAME" => $data[0],
      ];
      //Добавления элемента в инфоблок
      
      if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
          echo "Добавлен элемент с ID : " . $PRODUCT_ID . "<br>";
      } else {
          echo "Error: " . $el->LAST_ERROR . '<br>';
      }
    
   
  }
  fclose($handle);
}

?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>