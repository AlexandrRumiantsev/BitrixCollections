const HOST = window.location.host;
const PROTOCOL = window.location.protocol;

/**
 * function sendFormData from header sait
 * send form ajax to API
 */
function sendFormData(form, type, url, callback) {

    //const overlay = document.querySelector('.overlay');
    const XHR = new XMLHttpRequest();

    XHR.addEventListener("load", function(event) {
        //overlay.classList.remove('active');
        //popupp.classList.toggle('active');

        (callback) ? callback(
            event.srcElement.response
        ): '';

    });
    XHR.addEventListener("error", function(event) {
        console.log('Oops! Something went wrong.');
    });
    XHR.open(type, url);
    XHR.send(form);
    //overlay.classList.add('active');
}

if(document.forms.add_project)
  document.forms.add_project.onsubmit = function(e){
    e.preventDefault();
    sendFormData(
            new FormData(this),
            'POST',
            `${PROTOCOL}//${HOST}/wp-content/plugins/wp-alexweber-portfolio/sql/add.php`,
            function(response){
                if(response){
                	console.log(response);
                	alert('Проект добавлен');
                	window.location.href = '/wp-admin/admin.php?page=my-top-level-handle';
                }
            }
        )
  }
  
  
  if(document.querySelectorAll("#del"))
  Object.keys(document.querySelectorAll("#del")).forEach(function(index){
  	document.querySelectorAll("#del")[index].onclick = function(){
  	    var that = this;
  		sendFormData(
            null,
            'POST',
            `${PROTOCOL}//${HOST}/wp-content/plugins/wp-alexweber-portfolio/sql/del.php?id=${this.dataset.target}`,
            function(response){
                if(response){
                	that.parentElement.remove();
                }
            }
        )
  	}
  })
  
  
  
  if(document.querySelectorAll("#edit"))
  Object.keys(document.querySelectorAll("#edit")).forEach(function(index){
  	document.querySelectorAll("#edit")[index].onclick = function(){
      
  	   
      	
        
        
        Promise.resolve( createPopupp(this.parentElement) ).then( initEvent()/*initDropzone()*/ );
      
  	}
  })
   
  function convertToStr(el){ 
	  var tmp = document.createElement("div");
	  tmp.appendChild(el);
	  return tmp.innerHTML;
  }
  
  var closePopupp = function(e){
    	document.querySelector(".overlay.page").remove();
  }
  
  function createPopupp(elem){
    console.log(elem);
  	var data = JSON.parse(elem.querySelector('#data-json').innerText);
  	var popupp = `
  		<form id='popupp' enctype="multipart/form-data" class='popupp'>
			<img onClick='closePopupp()' class='close_btn' src='https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-close-512.png'/>
  			Заголовок: <p><input name='name' value="${data.name}" /></p>
			URL: <p><input name='url' value="${data.url}" /></p>
			Описание: <p><input name='discr' value="${data.discr}" /></p>
            Превью <p><input name="prev" type="file" /></p>
			Детальное изображение <p><input name="detail" type="file" /></p>
			<input value="Сохранить" type="submit" />
			<input name="id" type="hidden" value="${data.id}"/>
  		</form>
  	`;
    /*
    <form action="/file-upload" class="dropzone">
              <div id="uploadme" class="fallback">
                <input name="file" type="hidden" multiple />
				<div class="dz-message" data-dz-message>
					<span>
						<img 
						id='default'
						class='data-dz-thumbnail'
						src='${elem.querySelector('img').cloneNode(true).src}'
						/>
					</span>
				</div>
              </div>
            </form>
    */
  	var overlay = document.createElement('div');
  	overlay.className = 'overlay page';
  	overlay.innerHTML = popupp;
  	document.body.appendChild(overlay);
    
	
    
  }

function initEvent(){
	document.forms.popupp.onsubmit = function(e){
    	e.preventDefault();
      	var formData = new FormData(this);
      sendFormData(
            formData,
            'POST',
            `${PROTOCOL}//${HOST}/wp-content/plugins/wp-alexweber-portfolio/sql/edit.php?id=${this.dataset.target}`,
            function(response){
                if(response){
                  	console.log(response);
                  	
                	if(response){
                      	window.location.href = window.location.href
                    }
                }
            }
        )
    };
}
function initDropzone(){
	var myDropzone = new Dropzone("#uploadme", { url: "/file/post"});
  	Dropzone.options.myAwesomeDropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFiles: 1, // MB
    accept: function(file, done) {
      if (file.name == "justinbieber.jpg") {
        done("Naha, you don't.");
      }
      else { done(); }
    }  
};
  myDropzone.on("sending", function(file) {
    //myDropzone.removeFile(file);
    console.log(myDropzone);
    if(document.getElementById('default'))
    	document.getElementById('default').remove();
    else myDropzone.element.querySelector('.dz-preview.dz-processing.dz-image-preview.dz-success.dz-complete').remove();
  });
}



