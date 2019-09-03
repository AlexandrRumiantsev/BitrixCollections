<div id='my_view'>
     <div class='line-block-right active' :class="[activeClass]" v-on:click="makeActive('container', $event, 1 )"><i class="fab fa-black-tie"></i>Общие сведения</div>
	 <div class='line-block-right' :class="[activeClass]" v-on:click="makeActive('container', $event, 2)"><i class="fas fa-address-card"></i>Паспортные данные</div>
	 <div class='line-block-right' :class="[activeClass]" v-on:click="makeActive('container', $event, 3)"><i class="fas fa-book"></i>Личные данные</div>
	<template v-if="active==1 || active=='' ">
		  <general_info
              class='general'
              type="general_info"
              :id="idUser"
			  :name="nameUser"
		      :family="familyUser"
		      :lastname="lastNameUser"
              :databornuser="databornUser"
		      :familystatususer="familyStatusUser"
		      :detiuser="detiUser"
		      :countdetiUser="countDetiUser"
		      :armyuser="armyUser"
		      :obrazovanuser="obrazovanUser"
		      :grauser="graUser"
		      :snilsuser="snilsUser"
		      :innuser="innUser"
		      :addrregeUser='addrRegeUser'
		      :addrppropuser='addrpPropUser'
		      :userlive='userLive'
		      :addrinfouser='addrInfoUser'
		      :domteluser='domTelUser'
		      :mobteluser='mobTelUser'
		      :emailuser='emaileUser' 
		   >
		  </general_info>
	</template>
    <template v-if="active==2">
        <pasport_info
              class='pasport'
              type="pasport_info"
              :id="idUser"
			  :name="nameUser"
		      :family="familyUser"
		      :lastname="lastNameUser"
              :databornuser="databornUser">
		</pasport_info>
    </template>
   <template v-if="active==3">
        <personal_info
              class='pasport'
              type="pasport_info"
              :id="idUser"
			  :name="nameUser"
		      :family="familyUser"
		      :lastname="lastNameUser"
              :databornuser="databornUser">
		</personal_info>
    </template>
</div>

<script>
Vue.component('pasport_info', {
  props: ['family','name','lastname','databornuser'
  ],
 template: `
            <div>
	            <div class='row'> 
                    <div class='left-colmn'>
                      Фамилия:
                    </div> 
                    <div class='right-colmn'>
                     {{ family  }}
                    </div>
                </div>
                <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Имя:
                    </div> 
                    <div class='right-colmn'>
                     {{ name  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Отчество:
                    </div> 
                    <div class='right-colmn'>
                     {{ lastname  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Дата рождения:
                    </div> 
                    <div class='right-colmn'>
                     {{ databornuser  }}
                    </div>
                </div>
                 <hr class='hr'>
           `
});

Vue.component('personal_info', {
  props: ['family','name','lastname','databornuser'
  ],
 template: `
            <div>
	            <div class='row'> 
                    <div class='left-colmn'>
                      Фамилия:
                    </div> 
                    <div class='right-colmn'>
                     {{ family  }}
                    </div>
                </div>
                <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Имя:
                    </div> 
                    <div class='right-colmn'>
                     {{ name  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Отчество:
                    </div> 
                    <div class='right-colmn'>
                     {{ lastname  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Дата рождения:
                    </div> 
                    <div class='right-colmn'>
                     {{ databornuser  }}
                    </div>
                </div>
                 <hr class='hr'>
           `
});

Vue.component('general_info', {
  props: ['family','name','lastname','databornuser',
          'familystatususer','detiuser',
          'countdetiuser','armyuser','obrazovanuser',
          'grauser','snilsuser','innuser','addrregeuser',
          'addrppropuser','userlive','addrinfouser',
          'domteluser','mobteluser','emailuser'
  ],
 template: `
            <div>
	            <div class='row'> 
                    <div class='left-colmn'>
                      Фамилия:
                    </div> 
                    <div class='right-colmn'>
                     {{ family  }}
                    </div>
                </div>
                <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Имя:
                    </div> 
                    <div class='right-colmn'>
                     {{ name  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Отчество:
                    </div> 
                    <div class='right-colmn'>
                     {{ lastname  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Дата рождения:
                    </div> 
                    <div class='right-colmn'>
                     {{ databornuser  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Пол:
                    </div> 
                    <div class='right-colmn'>
                     {{   }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Гражданство:
                    </div> 
                    <div class='right-colmn'>
                     {{ grauser  }}
                    </div>
                </div>
                 <hr class='hr'>
                 <div class='row'> 
                    <div class='left-colmn'>
                      СНИЛС:
                    </div> 
                    <div class='right-colmn'>
                     {{ snilsuser  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      ИНН:
                    </div> 
                    <div class='right-colmn'>
                     {{ innuser  }}
                    </div>
                </div>
                 <hr class='hr'>
                  <div class='row'> 
                    <div class='left-colmn'>
                      Семейный статус:
                    </div> 
                    <div class='right-colmn'>
                     {{ familystatususer  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Адрес регистрации:
                    </div> 
                    <div class='right-colmn'>
                     {{ addrregeuser  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Адрес прописки:
                    </div> 
                    <div class='right-colmn'>
                     {{ addrppropuser  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Адрес проживания:
                    </div> 
                    <div class='right-colmn'>
                     {{ userlive  }}
                    </div>
                </div>
                 <hr class='hr'>
                 <div class='row'> 
                    <div class='left-colmn'>
                      Адрес для информирования:
                    </div> 
                    <div class='right-colmn'>
                     {{ addrinfouser  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
                      Домашний телефон:
                    </div> 
                    <div class='right-colmn'>
                     {{ domteluser  }}
                    </div>
                </div>
                 <hr class='hr'>
                <div class='row'> 
                    <div class='left-colmn'>
			         Мобильный телефон:
                    </div> 
                    <div class='right-colmn'>
                     {{ mobteluser  }}
                    </div>
                </div>
                 <hr class='hr'>
                 <div class='row'> 
                    <div class='left-colmn'>
                      Email:
                    </div> 
                    <div class='right-colmn'>
                     {{ emailuser  }}
                    </div>
                </div>

             </div>
           `
});
new Vue({
    data: {
			active: '',
			activeButton: null,
            activeClass: ''
          },
    el: "#my_view",
    methods: {
       makeActive: function(item, e , page){

		   console.log(e.target.className);

			   this.active = page;
			   this.activeButton = e.target;
		       this.activeClass = '';

               let result = e.target.className.match(/active/);
               var className = ' ' + e.target.className + ' ';

				if ( e.target.className.match(/active/) == null) {
                    var array = document.getElementsByClassName('line-block-right active');
                    var arr = [].slice.call(array);
					document.querySelectorAll('.line-block-right.active').forEach(function(v,k,s){
                      v.className = 'line-block-right';
                    });
                 e.target.className += ' active';
				}else {}      
        }
    }
})
</script>

<style>
	.left-colmn{
color: #951a1d;
    font-weight: bold;
    top: 90px;
    left: 30px;
    display: inline-block;
    position: relative;
}
	.row{
       display: grid;
       top: 10px;   
       position: relative;

     }
	.right-colmn{
         top: 90px;
        left: 400px;
		display: inline-block;
		position: absolute;
}
	.general{
		 position: relative;
         margin-top: -80px;
         height: 0;
    padding: 15px;
}
	.hr{
		background:#f5f9fa;
top: 100px;
    margin-top: 5px;
    position: relative;
}
	#my_view {
    position: absolute;
    top: -70px;
    width: 950px;
}
	.line-block-right.active{
border: 1px solid;
}
</style>