import {renderTable} from './form-table';

const buttonFilters = document.querySelectorAll('.filter-button');
const openFilters = document.querySelectorAll('.filter');
const filterForm = document.getElementById("filter-form");
const filter = document.getElementById('filter');

buttonFilters.forEach(buttonFilter => { 

    buttonFilter.addEventListener("click", () => {

        let appearElements = document.querySelectorAll(".appear");

        if(buttonFilter.classList.contains("appear")){

            buttonFilter.classList.remove("appear");

            appearElements.forEach(appearElement => {
                appearElement.classList.remove("appear");
            });

        }else{

            appearElements.forEach(appearElement => {
                appearElement.classList.remove("appear");
            });
            
            buttonFilter.classList.add("appear");

            openFilters.forEach(openFilter => {

                if(openFilter.dataset.content == buttonFilter.dataset.button){
                    openFilter.classList.add("appear"); 
                }else{
                }
            });
        }
    });
    
});

filter.addEventListener( 'click', () => {   
    
    let data = new FormData(filterForm);
    let url = filterForm.action;

    let sendPostRequest = async () => {

        try {
            await axios.post(url, data).then(response => {
                table.innerHTML = response.data.table;
                renderTable();
                
            });
            
        } catch (error) {

        }
    };

    

    sendPostRequest();
    
});

