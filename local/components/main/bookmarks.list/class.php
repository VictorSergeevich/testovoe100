<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
    Bitrix\Main\SystemException;

class BookMarksListComponent extends CBitrixComponent{

    /**
    * Получение списка элементов
    **/
    protected function MyGetList(){

        $elements = \Bitrix\Iblock\Elements\ElementCatalogTable::getList([
            'order' => array('SORT' => 'ASC'),
            'select' => ['ID', 'NAME', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'DATE_CREATE', 'CREATED_BY'],
            'filter' => [
                'IBLOCK_ID' => $this->arParams['IBLOCK_ID']
            ],
            "cache" => ["ttl" => 3600]
        ]);

        while($arElem = $elements->fetch()) {

            if($arElem["PREVIEW_PICTURE"]){
                $arElem["PREVIEW_PICTURE"] = CFile::GetPath($arElem["PREVIEW_PICTURE"]);
            }
            $this->arResult['ITEMS'][] = $arElem;
        }

    }

    /**
     * прерывает кеширование
     */
    protected function abortDataCache()
    {
        $this->AbortResultCache();
    }

    public function executeComponent()
    {
        global $APPLICATION;
        $this->arParams["CACHE_TIME"] = 3600;
        try {
            if ($this->StartResultCache()) {
                $this->MyGetList();
                // $this->MyPagination();
                if (count($this->arResult['ITEMS']) == 0) {
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