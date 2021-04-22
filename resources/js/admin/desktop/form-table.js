import {renderCkeditor} from './ckeditor'
const table = document.getElementById("table");
const form = document.getElementById("form");


export let renderForm = () => {

    let forms = document.querySelectorAll(".admin-form");
    let labels = document.getElementsByTagName('label');
    let inputs = document.querySelectorAll('.input');
    let enviar = document.getElementById("send");

    inputs.forEach(input => {

        input.addEventListener('focusin', () => {
    
            for( var i = 0; i < labels.length; i++ ) {
                if (labels[i].htmlFor == input.name){
                    labels[i].classList.add("active");
                }
            }
        });
    
        input.addEventListener('blur', () => {
    
            for( var i = 0; i < labels.length; i++ ) {
                labels[i].classList.remove("active");
            }
        });
    });
    
    enviar.addEventListener("click", (event) => {

        event.preventDefault ()
    
        forms.forEach(form => { 
                        
            let data = new FormData(form);

            if( ckeditors != 'null'){

                Object.entries(ckeditors).forEach(([key, value]) => {
                    data.append(key, value.getData());
                });
            }

            let url = form.action;
    
            let sendPostRequest = async () => {
    
                try {
                    await axios.post(url, data).then(response => {
                        form.id.value = response.data.id;
                        table.innerHTML = response.data.table;
                        renderTable();
                        
                    });
                    
                } catch (error) {
    
                    if(error.response.status == '422'){
    
                        let errors = error.response.data.errors;      
                        let errorMessage = '';
    
                        Object.keys(errors).forEach(function(key) {
                            errorMessage += '<li>' + errors[key] + '</li>';
                        })
        
                        document.getElementById('error-container').classList.add('active');
                        document.getElementById('errors').innerHTML = errorMessage;
                    }
                }
            };
    
            sendPostRequest();
        });
    });
    
    renderCkeditor()
};


export let renderTable = () => {
    
    let editButtons= document.querySelectorAll(".edit");
    let removeButtons = document.querySelectorAll(".remove");
    let headerCells = document.querySelectorAll(".table-sortable th");

    editButtons.forEach(editButton => {

        editButton.addEventListener("click", () => {

            let url = editButton.dataset.url;

            let sendEditRequest = async () => {

                try {
                    await axios.get(url).then(response => {
                        form.innerHTML = response.data.form;
                        renderForm();
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };

            sendEditRequest();
        });
    });

    removeButtons.forEach(removeButton => {

        removeButton.addEventListener("click", () => {

            let url = removeButton.dataset.url;

            let sendDeleteRequest = async () => {

                try {
                    await axios.delete(url).then(response => {
                        table.innerHTML = response.data.table;
                        renderTable();
                    });
                    
                } catch (error) {
                    console.error(error);
                }
            };

            sendDeleteRequest();
        });
    });

    /**
     * Ordenar HTML Tabla   
     * 
     * @param {HTMLTableElement} table La tabla que ordenamos 
     * @param {number} column El index de la columna que ordenamos
     * @param {boolean} asc Determina la dirreccion del orden asc o dsc 
     */

    headerCells.forEach(headerCell => {

        headerCell.addEventListener("click", () =>{

            let table= headerCell.parentElement.parentElement.parentElement;
            let column = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
            let asc = !headerCell.classList.contains("th-sort-asc");

            let dirModifier = asc ? 1 : -1;
            let tBody = table.tBodies[0];
            let rows = Array.from(tBody.querySelectorAll('tr'));

            // Ordenar cada fila
            let sortedRows = rows.sort((a, b) =>{

                let aColText =a.querySelector(`td:nth-child(${column + 1})`).textContent.trim();
                let bColText =b.querySelector(`td:nth-child(${ column + 1})`).textContent.trim();

                return aColText > bColText ? (1 * dirModifier) : (-1 * dirModifier);
            });


            // Eliminar los tr que existan en la tabla 

            while(tBody.firstChild) {
                tBody.removeChild(tBody.firstChild);
            }

            // Vuelve a añadir la nueva fila ordenada
            tBody.append(...sortedRows);

            // Recordad como esta la columna ordenada
            table.querySelectorAll("th").forEach(th => th.classList.remove("th-sort-asc", "th-sort-desc"));
            table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-asc", asc);
            table.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("th-sort-desc", !asc);
        });
    });
};

renderForm();
renderTable();
