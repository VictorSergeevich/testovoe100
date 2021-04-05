<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
    Bitrix\Main\SystemException,
    Bitrix\Iblock,
    Bitrix\Main\Page\Asset;

class BookMarksComponent extends CBitrixComponent{

    protected function SefMode(){

        $arDefaultUrlTemplates = array(
            "list" => "list.php",
            "detail" => "detail.php"
        );

        $arParams["SEF_URL_TEMPLATES"] = array(
            "list" => "index.php",
            "detail" => "detail-#ELEMENT_CODE#/"
        );

        $arDefaultVariableAliases404 = array();
        $arParams["VARIABLE_ALIASES"] = array(
            "detail" => array(
                "ELEMENT_ID" => "#ELEMENT_CODE#",
            )
        );

        $arVariables = array();

        $arUrlTemplates =  CComponentEngine::MakeComponentUrlTemplates($arDefaultUrlTemplates,$arParams["SEF_URL_TEMPLATES"]);

        $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases404, $arParams["VARIABLE_ALIASES"]);

        $componentPage = CComponentEngine::ParseComponentPath(
            '/bookmarks/',
            $arUrlTemplates,
            $arVariables
        );


        if(!$componentPage){
            $componentPage = "list";
        }
       CComponentEngine::initComponentVariables($componentPage, $this->arComponentVariables, $arVariableAliases, $arVariables);

        $this->arResult = array(
            "FOLDER" => '/bookmarks/',
            "URL_TEMPLATES" => $arUrlTemplates,
            "VARIABLES" => $arVariables,
            "ALIASES" => $arVariableAliases,
        );
        return $componentPage;
    }


    public function executeComponent()
    {
        $componentPage = $this->SefMode();
        $this->IncludeComponentTemplate($componentPage);

        Asset::getInstance()->addJs("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");
        Asset::getInstance()->addCss("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    }
}

?>