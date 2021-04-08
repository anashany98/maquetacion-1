import {renderForm, renderTable} from './form.js'

const { default: axios } = require("axios");
const table = document.getElementById("table");
const form = document.getElementById("form");
const links = document.querySelectorAll(".link");

links.forEach(link =>{

    link.addEventListener("click", () => {
        let url = link.dataset.url;

            let RefreshRequest = async () => {

                try {
                    await axios.get(url).then(response => {
                        form.innerHTML = response.data.form;
                        table.innerHTML = response.data.table;
                        renderForm();
                        renderTable();

                    });
                    
                } catch (error) {
                    console.error(error);
                }

                
            };

            RefreshRequest();
        });
});
