import {NumeralForm} from "./NumeralForm";
import {DeleteAlert} from "./DeleteAlert";
import {ToggleShowPassword} from "./ToggleShowPassword";
import {EnableField} from "./EnableField";

import flatPicker from "flatpickr";
import {Spanish} from "flatpickr/dist/l10n/es.js"

flatPicker.localize(require('flatpickr/dist/themes/airbnb.css'));


EnableField('productsPoint');

NumeralForm(document.querySelectorAll('.money'));

ToggleShowPassword({
    fieldId: '#password',
    controlId: '#viewPassword'
});

const deleteElement = document.querySelector('#deleteElement');
if (deleteElement) {
    deleteElement.addEventListener('click', function () {
        DeleteAlert({
            title: 'Estas seguro de eliminar?',
            text: 'Recuerda que no podrás volver a recuperar la info',
            formId: 'delete'
        });
    });
}

const formInsertProductPoint = document.querySelector('#formInsertProductPoint');
if (formInsertProductPoint) {
    formInsertProductPoint.addEventListener('submit', function (e) {
        e.preventDefault();
        DeleteAlert({
            title: 'Estas seguro?',
            text: 'Recuerda que no podrás volver a ingresar la información',
            formId: 'formInsertProductPoint'
        });
    });
}

document.querySelectorAll('input.error,select.error').forEach(function (e) {
    e.addEventListener('change', function () {
        this.classList.remove('error');
        console.log(this);
        this.nextSibling.nextSibling.remove();
    })
});

document.querySelectorAll('.close').forEach(function (e) {
    e.addEventListener('click', function () {
        this.parentElement.remove();
    })
});


const dateInput = document.querySelector('#date');
if (dateInput) {
    flatPicker(dateInput, {
        "locale": Spanish // locale for this instance only
    });
}

const formPointDate = document.querySelector('#form-points-date');
if (formPointDate) {
    formPointDate.addEventListener('click', function (e) {
        e.preventDefault();
        let date = document.getElementById('date').value;
        if (date !== '') {
            this.setAttribute('action', this.getAttribute('action').replace('date', date));
            this.submit();
        }
    })
}










