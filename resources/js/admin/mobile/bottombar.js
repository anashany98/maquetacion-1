var change = document.getElementById('change');
var table = document.getElementById('table');
var form =document.getElementById('form');
var edit =document.getElementById('edit')
var contador =0;

change.addEventListener('click',cambio,true)

function cambio(){
    if(contador ==0){
        table.classList.remove('visible')
        form.classList.add('visible')
        contador=1;
    }
    else if (contador ==1){
        table.classList.add('visible');
        form.classList.remove('visible')
        contador=0;
       
    }else{false

    }
}

