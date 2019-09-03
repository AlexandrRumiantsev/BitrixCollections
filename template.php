<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>

<div class='wrapper'>
    <h1>Биографические данные</h1>

        <hr class='gray-hr'>
        <div class='block-left'>
            <span class='ava-container'><img src='/ava.png'></span>
            <div class='inline-block'>
                <p class='marginNull'>Фамилия: <i><?=$GLOBALS['userInfo']['UF_F1']?></i></p>
                <p class='marginNull'>Имя: <i><?=$GLOBALS['userInfo']['UF_I1']?></i></p>
                <p class='marginNull'>Отчество: <i><?=$GLOBALS['userInfo']['UF_O1']?></i></p>
            </div>
             <div class='inline-block'>
                  <?php
                    $short_link = substr($GLOBALS['userInfo']['UF_DR'], 0, 4);
                  ?>
                 <p class='data'><?=$short_link ?></p>
             </div>
                <div>
                 <img class='now-img' src='/icon-1498822_960_720.png'><p class='now-sait'>Сейчас на сайте</p>
                    <p class='list-funk biogr active'><i class="far fa-address-book" aria-hidden="true"></i>Биографические данные</p>
                    <p class='list-funk'><i class="fas fa-heartbeat" aria-hidden="true"></i>Диагностическая карта</p>
                    <p class='list-funk'><i class="fas fa-graduation-cap"></i>Образование</p>
                    <p class='list-funk'><i class="fas fa-archive"></i>Опыт работы</p>
                    <p class='list-funk'><i class="fas fa-comment"></i>Отзывы работодателей</p>
                    <p class='list-funk'><i class="far fa-window-restore"></i>Тестирование, анкетирование</p>
                    <p class='list-funk'><i class="fas fa-users"></i>Личное портфолио</p>
                </div>
        </div>

        <div class='block-right'>
            <div class='content-block-right'>
                <script>
                       //Данные для общих сведений
                       var idUser = "<?=$GLOBALS['userInfo']['ID']?>";
                       var familyUser = "<?=$GLOBALS['userInfo']['UF_F1']?>";
                       var nameUser = "<?=$GLOBALS['userInfo']['UF_I1']?>";
                       var lastNameUser = "<?=$GLOBALS['userInfo']['UF_O1']?>";
                       var databornUser = "<?=date('d.m.Y', $GLOBALS['userInfo']['UF_DR'])?>";
                       var familyStatusUser = "<?=$GLOBALS['userInfo']['UF_SEM']?>";
                       //var imgUser = "<?=$GLOBALS['userInfo']['UF_IMG']?>";
                       var detiUser = "<?=$GLOBALS['userInfo']['UF_DET']?>";
                       var countDetiUser = "<?=$GLOBALS['userInfo']['UF_DET1']?>"; 
                       var armyUser = "<?=$GLOBALS['userInfo']['UF_ARMY']?>";
                       var obrazovanUser = "<?=$GLOBALS['userInfo']['UF_VASHUROBR']?>";   
                       var graUser = "<?=$GLOBALS['userInfo']['UF_GRA']?>";
                       var snilsUser = "<?=$GLOBALS['userInfo']['UF_SNILS']?>";
                       var innUser = "<?=$GLOBALS['userInfo']['UF_INN']?>";

                       var addrRegeUser = "<?=$GLOBALS['userInfo']['UF_BYLIGR']?>";
                       var addrpPropUser = "<?=$GLOBALS['userInfo']['UF_PSTR']?>";
                       var userLive = "<?=$GLOBALS['userInfo']['UF_FPR']?>";
                       var addrInfoUser = "<?=$GLOBALS['userInfo']['UF_MR']?>";

                       var domTelUser = "<?=$GLOBALS['userInfo']['UF_TLFR1']?>";
                       var mobTelUser = "<?=$GLOBALS['userInfo']['UF_MB1']?>";
                       var emaileUser = "<?=$GLOBALS['userInfo']['UF_EMAIL']?>";

                      //Данные паспортные

                </script>
                <?php include 'vue.html' ?>
            </div>
        </div>
</div>
