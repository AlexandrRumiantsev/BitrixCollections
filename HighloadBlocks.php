<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Заголовок сайта");


CModule::IncludeModule("highloadblock");
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;

use Bitrix\Highloadblock as HL;

function CreateHB($name, $table_name)
{
    $typeArrs = array(
        "SUBMITDATE",
        "F1",
        "I1",
        "O1",
        "DR",
        "SEM",
        "IMG",
        "DET",
        "DET1",
        "ARMY",
        "VASHUROBR",
        "SP1",
        "NP1",
        "GRA",
        "VOZR",
        "BYLIGR",
        "PSTR",
        "FPR",
        "MR",
        "INN",
        "SNILS",
        "MB1",
        "EMAIL",
        "SOC",
        "ATT",
        "MEDAL",
        "PROBALL",
        "SRDIOTL",
        "OSNVISH",
        "VISHOTL",
        "AASRBA1",
        "FAK",
        "SPEC",
        "FORMOB",
        "GODOK",
        "SPHERA",
        "MEST",
        "MESTOP",
        "UROV",
        "DOLJ",
        "CATEGORY",
        "DATDOLJ",
        "VREM",
        "RABNAZV1",
        "DAT1",
        "DATUV",
        "DOLJ1",
        "KLUCH1",
        "RAB2",
        "UST2",
        "UV2",
        "DOLJ2",
        "KLUCH2",
        "RAB3",
        "DAT3",
        "UV3",
        "DOLJ3",
        "KLUCH3",
        "RAB4",
        "DAT4",
        "UV4",
        "DOLJ4",
        "KLUCH4",
        "RAB5",
        "DAT5",
        "UV5",
        "DOLJ5",
        "KLUCH5",
        "A1000",
        "A500",
        "A200",
        "A100",
        "A50",
        "A20",
        "ANE20",
        "PAT",
        "CHIN",
        "KLASSCHIN",
        "DEP1",
        "NAGR1",
        "NAG1I",
        "NAGR2",
        "NAGR2I",
        "COMP",
        "sport1",
        "YAZ_SQ002",
        "YAZ_SQ003",
        "YAZ_SQ004",
        "YAZ_SQ005",
        "YAZ_SQ006",
        "YAZ_SQ007",
        "YAZ_SQ008",
        "YAZ_OTHER",
        "KONK_SQ002",
        "KONK_SQ003",
        "KONK_SQ004",
        "KONK_OTHER",
        "KONK2_SQ002",
        "KONK2_SQ003",
        "KONK2_SQ004",
        "KONK2_OTHER",
        "OBSCH1",
        "OBSCH2",
        "LID1",
        "IDEA",
        "PREDL",
        "TXT1",
        "ANA1",
        "ANA2",
        "ANA3",
        "KOLVO",
        "NASTA",
        "NAST2",
        "PREP",
        "TEMA",
        "PROJ1",
        "PROJ2",
        "NULL",
        "PROJJ",
        "PROJJJJ",
        "NACH1",
        "NACH2",
        "NACH3",
        "PP1",
        "PP2",
        "TRUDSTAJ",
        "RUKLUD",
        "STAJ",
        "VOZR1",
        "MAXPOS",
        "RABZAD",
        "GGS",
        "ROL",
        "GOSSS",
        "REGI",
        "MIN",
        "MUNIC",
        "VLIYA",
        "VIZOV",
        "RUK1",
        "PROF1",
        "GOT1",
        "GOT2",
        "GOT3",
        "XOZHU",
        "XOZHU2",
        "FR1",
        "IR1",
        "OR1",
        "MRR1",
        "DLJR1",
        "EMAILR1",
        "TLFR1",
        "FR2",
        "IR2",
        "OR2",
        "MRR2",
        "DLJR2",
        "EMAILR2",
        "TLFR2",
        "FR3",
        "IR3",
        "OR3",
        "MRR3",
        "DLJR3",
        "EMAILR3",
        "TLFR3"
    );
    
    $highloadBlockData = array(
        "NAME" => $name,
        "TABLE_NAME" => $table_name
    );
    $result            = HLBT::add($highloadBlockData);
    $highLoadBlockId   = $result->getId();
    //var_dump($highLoadBlockId);
    $userTypeEntity    = new CUserTypeEntity();
    
    
    foreach ($typeArrs as $typeArr) {
        echo $typeArr;
        $userTypeData = array(
            "ENTITY_ID" => "HLBLOCK_" . $highLoadBlockId,
            "FIELD_NAME" => "UF_" . $typeArr,
            "USER_TYPE_ID" => "string",
            "XML_ID" => "XML_ID_" . $typeArr,
            "SORT" => 100,
            "MULTIPLE" => "N",
            "MANDATORY" => "N",
            "SHOW_FILTER" => "N",
            "SHOW_IN_LIST" => "",
            "EDIT_IN_LIST" => "",
            "IS_SEARCHABLE" => "N",
            "SETTINGS" => array(
                "DEFAULT_VALUE" => "",
                "SIZE" => "20",
                "ROWS" => "1",
                "MIN_LENGTH" => "0",
                "MAX_LENGTH" => "0",
                "REGEXP" => ""
            ),
            "EDIT_FORM_LABEL" => array(
                "ru" => "",
                "en" => ""
            ),
            "LIST_COLUMN_LABEL" => array(
                "ru" => "",
                "en" => ""
            ),
            "LIST_FILTER_LABEL" => array(
                "ru" => "",
                "en" => ""
            ),
            "ERROR_MESSAGE" => array(
                "ru" => "",
                "en" => ""
            ),
            "HELP_MESSAGE" => array(
                "ru" => "",
                "en" => ""
            )
        );
        $userTypeId   = $userTypeEntity->Add($userTypeData);
    }
    
}

function ApiData()
{
    $query = urlencode('v=0&filt=3&m=1');
    $url = 'Урл по которому делается запрос';
    $ch    = curl_init($url .'/answers.php?' . $query);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Parse-Application-Id: myApplicationID',
        'X-Parse-REST-API-Key: myRestAPIKey',
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $html = curl_exec($ch);
    
    curl_exec($ch);
    curl_close($ch);
    return $html;
}

function AddHB($array)
{
    foreach ($array as $arr) {
        $data = array(
            "UF_SUBMITDATE" => $arr->submitdate,
            "UF_F1" => $arr->f1,
            "UF_I1" => $arr->i1,
            "UF_O1" => $arr->o1,
            "UF_DR" => $arr->DR,
            "UF_SEM" => $arr->sem,
            "UF_IMG" => $arr->img,
            "UF_DET" => $arr->det,
            "UF_DET1" => $arr->det1,
            "UF_ARMY" => $arr->army,
            "UF_VASHUROBR" => $arr->vashurobr,
            "UF_SP1" => $arr->sp1,
            "UF_NP1" => $arr->Np1,
            "UF_GRA" => $arr->gra,
            "UF_VOZR" => $arr->vozr,
            "UF_BYLIGR" => $arr->byligr,
            "UF_PSTR" => $arr->pstr,
            "UF_FPR" => $arr->fpr,
            "UF_MR" => $arr->mr,
            "UF_INN" => $arr->INN,
            "UF_SNILS" => $arr->SNILS,
            "UF_MB1" => $arr->mb1,
            "UF_EMAIL" => $arr->email,
            "UF_SOC" => $arr->soc,
            "UF_ATT" => $arr->att,
            "UF_MEDAL" => $arr->medal,
            "UF_PROBALL" => $arr->proball,
            "UF_SRDIOTL" => $arr->srdiotl,
            "UF_OSNVISH" => $arr->osnvish,
            "UF_VISHOTL" => $arr->vishotl,
            "UF_AASRBA1" => $arr->aasrba1,
            "UF_FAK" => $arr->fak,
            "UF_SPEC" => $arr->spec,
            "UF_FORMOB" => $arr->formob,
            "UF_GODOK" => $arr->godok,
            "UF_SPHERA" => $arr->Sphera,
            "UF_MEST" => $arr->mest,
            "UF_MESTOP" => $arr->mestop,
            "UF_UROV" => $arr->urov,
            "UF_DOLJ" => $arr->dolj,
            "UF_CATEGORY" => $arr->category,
            "UF_DATDOLJ" => $arr->datdolj,
            "UF_VREM" => $arr->vrem,
            "UF_RABNAZV1" => $arr->rabnazv1,
            "UF_DAT1" => $arr->dat1,
            "UF_DATUV" => $arr->Datuv,
            "UF_DOLJ1" => $arr->dolj1,
            "UF_KLUCH1" => $arr->kluch1,
            "UF_RAB2" => $arr->rab2,
            "UF_UST2" => $arr->ust2,
            "UF_UV2" => $arr->uv2,
            "UF_DOLJ2" => $arr->dolj2,
            "UF_KLUCH2" => $arr->kluch2,
            "UF_RAB3" => $arr->rab3,
            "UF_DAT3" => $arr->dat3,
            "UF_UV3" => $arr->uv3,
            "UF_DOLJ3" => $arr->dolj3,
            "UF_KLUCH3" => $arr->kluch3,
            "UF_RAB4" => $arr->rab4,
            "UF_DAT4" => $arr->dat4,
            "UF_UV4" => $arr->uv4,
            "UF_DOLJ4" => $arr->dolj4,
            "UF_KLUCH4" => $arr->kluch4,
            "UF_RAB5" => $arr->rab5,
            "UF_DAT5" => $arr->dat5,
            "UF_UV5" => $arr->uv5,
            "UF_DOLJ5" => $arr->dolj5,
            "UF_KLUCH5" => $arr->kluch5,
            "UF_A1000" => $arr->a1000,
            "UF_A500" => $arr->a500,
            "UF_A200" => $arr->a200,
            "UF_A100" => $arr->a100,
            "UF_A50" => $arr->a50,
            "UF_A20" => $arr->a20,
            "UF_ANE20" => $arr->ane20,
            "UF_PAT" => $arr->pat,
            "UF_CHIN" => $arr->chin,
            "UF_KLASSCHIN" => $arr->klasschin,
            "UF_DEP1" => $arr->dep1,
            "UF_NAGR1" => $arr->nagr1,
            "UF_NAG1I" => $arr->nag1i,
            "UF_NAGR2" => $arr->nagr2,
            "UF_NAGR2I" => $arr->nagr2i,
            "UF_COMP" => $arr->comp,
            "UF_SPORT1" => $arr->sport1,
            "UF_YAZ_SQ002" => $arr->yaz_SQ002,
            "UF_YAZ_SQ003" => $arr->yaz_SQ003,
            "UF_YAZ_SQ004" => $arr->yaz_SQ004,
            "UF_YAZ_SQ005" => $arr->yaz_SQ005,
            "UF_YAZ_SQ006" => $arr->yaz_SQ006,
            "UF_YAZ_SQ007" => $arr->yaz_SQ007,
            "UF_YAZ_SQ008" => $arr->yaz_SQ008,
            "UF_YAZ_OTHER" => $arr->yaz_other,
            "UF_KONK_SQ002" => $arr->konk_SQ002,
            "UF_KONK_SQ003" => $arr->konk_SQ003,
            "UF_KONK_SQ004" => $arr->konk_SQ004,
            "UF_KONK_OTHER" => $arr->konk_other,
            "UF_KONK2_SQ002" => $arr->konk2_SQ002,
            "UF_KONK2_SQ003" => $arr->konk2_SQ003,
            "UF_KONK2_SQ004" => $arr->konk2_SQ004,
            "UF_KONK2_OTHER" => $arr->konk2_other,
            "UF_OBSCH1" => $arr->obsch1,
            "UF_OBSCH2" => $arr->obsch2,
            "UF_LID1" => $arr->lid1,
            "UF_IDEA" => $arr->idea,
            "UF_PREDL" => $arr->predl,
            "UF_TXT1" => $arr->txt1,
            "UF_ANA1" => $arr->ana1,
            "UF_ANA2" => $arr->ana2,
            "UF_ANA3" => $arr->ana3,
            "UF_KOLVO" => $arr->kolvo,
            "UF_NASTA" => $arr->nasta,
            "UF_NAST2" => $arr->nast2,
            "UF_PREP" => $arr->prep,
            "UF_TEMA" => $arr->tema,
            "UF_PROJ1" => $arr->proj1,
            "UF_PROJ2" => $arr->proj2,
            "UF_NULL" => $arr->null,
            "UF_PROJJ" => $arr->projj,
            "UF_PROJJJJ" => $arr->projjjj,
            "UF_NACH1" => $arr->nach1,
            "UF_NACH2" => $arr->nach2,
            "UF_NACH3" => $arr->nach3,
            "UF_PP1" => $arr->pp1,
            "UF_PP2" => $arr->pp2,
            "UF_TRUDSTAJ" => $arr->trudstaj,
            "UF_RUKLUD" => $arr->ruklud,
            "UF_STAJ" => $arr->staj,
            "UF_VOZR1" => $arr->vozr1,
            "UF_MAXPOS" => $arr->maxpos,
            "UF_GGS" => $arr->ggs,
            "UF_ROL" => $arr->rol,
            "UF_GOSSS" => $arr->gosss,
            "UF_REGI" => $arr->regi,
            "UF_MIN" => $arr->min,
            "UF_MUNIC" => $arr->munic,
            "UF_VLIYA" => $arr->vliya,
            "UF_VIZOV" => $arr->vizov,
            "UF_RUK1" => $arr->ruk1,
            "UF_PROF1" => $arr->prof1,
            "UF_GOT1" => $arr->got1,
            "UF_GOT2" => $arr->got2,
            "UF_GOT3" => $arr->got3,
            "UF_XOZHU" => $arr->xozhu,
            "UF_XOZHU2" => $arr->xozhu2,
            "UF_FR1" => $arr->fr1,
            "UF_IR1" => $arr->ir1,
            "UF_OR1" => $arr->or1,
            "UF_MRR1" => $arr->mrr1,
            "UF_DLJR1" => $arr->dljr1,
            "UF_EMAILR1" => $arr->emailr1,
            "UF_TLFR1" => $arr->tlfr1,
            "UF_FR2" => $arr->fr2,
            "UF_IR2" => $arr->ir2,
            "UF_OR2" => $arr->or2,
            "UF_MRR2" => $arr->mrr2,
            "UF_DLJR2" => $arr->dljr2,
            "UF_EMAILR2" => $arr->emailr2,
            "UF_TLFR2" => $arr->tlfr2,
            "UF_FR3" => $arr->fr3,
            "UF_IR3" => $arr->ir3,
            "UF_OR3" => $arr->or3,
            "UF_MRR3" => $arr->mrr3,
            "UF_DLJR3" => $arr->dljr3,
            "UF_EMAILR3" => $arr->emailr3,
            "UF_TLFR3" => $arr->tlfr3,
            "UF_RABZAD" => $arr->rabzad
        );
        
        $HL_Infoblock_ID = 26;
        
        $hlblock           = Bitrix\Highloadblock\HighloadBlockTable::getById($HL_Infoblock_ID)->fetch();
        $entity            = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        
        $result = $entity_data_class::add($data);
        $ID     = $result->getId();
        if ($result->isSuccess()) {
            echo 'В справочник добавлена запись ' . $ID . '<br />';
        } else {
            echo 'Ошибка добавления записи';
        }
    }
}




function searchInfo($data, $index)
{
    
    $tel1 = '89308761683';
    $tel2 = '89038383006';
    
    $snils = '166-879-395 48';
    
    $passport = 'Рязанская область Рыбновский район поселок Глебково';
    
    $f    = 'Шершнева';
    $i    = 'Наталья';
    $o    = 'Олеговна';
    $data = '1991-10-28 00:00:00';
    
    $mail = 'natashashershneva@me.com';
    
    $hlblock_id        = 26;
    $hlblock           = Bitrix\Highloadblock\HighloadBlockTable::getById($hlblock_id)->fetch(); // получаем объект вашего HL блока
    $entity            = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock); // получаем рабочую сущность
    $entity_data_class = $entity->getDataClass();
    $entity_table_name = $hlblock['TABLE_NAME'];
    $sTableID          = 'tbl_' . $entity_table_name;
    
    switch ($index) {
        case 'tel':
            $arFilter = array(
                "UF_TLFR1" => $tel1,
                "UF_TLFR2" => $tel2
            );
            break;
        case 'snils':
            $arFilter = array(
                "UF_SNILS" => $snils
            );
            break;
        case 'pasport':
            $arFilter = array(
                "UF_PSTR" => $passport
            );
            break;
        case 'fioData':
            $arFilter = array(
                "UF_F1" => $f,
                "UF_I1" => $i,
                "UF_O1" => $o,
                "UF_DR" => $data
            );
            break;
        case 'mail':
            $arFilter = array(
                "UF_EMAIL" => $mail
            );
            break;
    }
    
    var_dump($arFilter);
    
    $arSelect = array(
        '*'
    );
    
    // подготавливаем данные
    $rsData = $entity_data_class::getList(array(
        "select" => $arSelect,
        "filter" => $arFilter
        //"limit" => '5', //ограничим выборку пятью элементами
        //"order" => $arOrder
    ));
    
    // выполняем запрос. Передаем в него наши данные и название таблицы, которое мы получили в самом начале
    $rsData = new CDBResult($rsData, $sTableID); // записываем в переменную объект CDBResult
    
    // а далее простой цикл и знакомый нам метод Fetch (или GetNext, кому что нравится)
    while ($arRes = $rsData->Fetch()) {
        print_r($arRes['UF_F1']);
    }
    
}

if (array_key_exists('createTable', $_POST)) {
?><span class='hidden'>
	<?
    CreateHB('Digital', 'digital');
    echo '<meta http-equiv="refresh" content="10; URL=index.php">';
?></span><?
}

if (array_key_exists('api', $_POST)) {
    $resp = ApiData();
    AddHB(json_decode($resp));
    //var_dump(json_decode($resp));
}

if (array_key_exists('clearPOST', $_POST)) {
    echo '<meta http-equiv="refresh" content="10; URL=index.php">';
}

//ГЕТ запросы 

if ($_GET['snils']) {
    searchInfo($_GET['snils'], 'snils');
}
if ($_GET['passport']) {
    searchInfo($_GET['passport'], 'passport');
}
if ($_GET['fio'] && $_GET['data']) {
    searchInfo($_GET['fio'], 'fioData');
}
if ($_GET['mail']) {
    searchInfo($_GET['mail'], 'mail');
}
if ($_GET['tel']) {
    searchInfo($_GET['tel'], 'tel');
}
?>
<form method="post">
    <input type="submit" name="createTable" id="createTable" value="СоздатьБлок" /><br/>
    <input type="submit" name="api" id="api" value="ЗапросAPI" /><br/>
    <input type="submit" name="clearPOST" id="clearPOST" value="ОчиститьМассив" /><br/>
</form>
<br/>
<form method="get">
	<i>Поиск по СНИЛС</i><br/>
	<input type="input" name="snils" id="snils" placeholder="СНИЛС" /><br/><br/>
    <i>Поиск по Серия и номер паспорта</i><br/>
	<input  type="input" name="passport" id="passport" placeholder="Серия и номер паспорта" /><br/><br/>
    <i>Поиск по ФИО и Дата рождения</i><br/>
	<input type="input" name="fio" id="fio" placeholder="Фио и дата рождения" /><br/>
    <input type="input" name="data" id="data" placeholder="Дата" /><br/><br/>
     <i>Поиск по почте</i><br/>
	<input  type="input" name="mail" id="mail" placeholder="почта" /><br/><br/>
    <i>Поиск по телефону</i><br/>
	<input  type="input" name="tel" id="tel" placeholder="телефон" /><br/>
	<input type="submit" style='float:left;' name="search" id="search"  /><br/>
</form>
<style>
	.hidden{
		display:none;
}
	.btn-create-table{

}
</style>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>
