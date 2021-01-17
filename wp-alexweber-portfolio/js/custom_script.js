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
  		console.log(this.dataset.target);
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
  		//this.parentElement.remove();
  	}
  })

