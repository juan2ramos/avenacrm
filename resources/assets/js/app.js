import {NumeralForm} from "./NumeralForm";
import {DeleteAlert} from "./DeleteAlert";
import {ToggleShowPassword} from "./ToggleShowPassword";
import {EnableField} from "./EnableField";

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

document.querySelectorAll('input.error,select.error').forEach(function (e) {
    e.addEventListener('change', function () {
        this.classList.remove('error');
        console.log(this);
        this.nextSibling.nextSibling.remove();
    })
});

document.querySelectorAll('.close').forEach(function (e) {
    e.addEventListener('click', function () {
        console.log(this.parentElement);
        this.parentElement.remove();
    })
});












