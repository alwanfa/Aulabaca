var keyword= document.getElementById('search');
var container=document.getElementById('display-pencarian');
keyword.addEventListener('keyup', function(){
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState==4 && xhr.status == 200){
            container.innerHTML="Aceng"
        }
    }
    xhr.open('GET', 'search', true);
    xhr.send();
});