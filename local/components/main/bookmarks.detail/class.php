<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class RecipeDetailComponent extends CBitrixComponent{
    /**
     * прерывает кеширование
     */
    protected function abortDataCache()
    {
        $this->AbortResultCache();
    }
    /**
    * основной метод получение детальной 
    **/
    protected function GetDetail(){

        $elements = \Bitrix\Iblock\Elements\ElementCatalogTable::getList([
            'order' => array('SORT' => 'ASC'),
            'select' => ['ID', 'NAME', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'DATE_CREATE', 'CREATED_BY'],
            'filter' => [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID']
            ],
            "cache" => ["ttl" => 3600]
        ]);

        if($arElem = $elements->fetch()) {
            $this->arResult = $arElem;
        }

        if(!$this->arResult){

            $this->AbortResultCache();
            CHTTP::SetStatus("404 Not Found"); 
            @define('ERROR_404', 'Y');

            header("Location: /bookmarks/"); 
            exit(); 
            
        }

    }

    public function executeComponent()
    {
        $this->arParams["CACHE_TIME"] = 3600;
        try {
            if ($this->StartResultCache()) {
                $this->GetDetail();
                if (count($this->arResult) == 0) {
                    $this->abortDataCache();
                    return false;
                }
                $this->includeComponentTemplate();
            }
        } catch (Exception $e) {
            $this->abortDataCache();
            ShowError($e->getMessage());
        }
    }
}

?>