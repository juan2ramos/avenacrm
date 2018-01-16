import swal from 'sweetalert';

class DeleteAlertClass {

    constructor(settings) {
        this.settings = settings;
        this.init();
    }

    init() {
        swal({
            title: this.settings.title,
            text: this.settings.text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById(this.settings.formId).submit();
                }
            });
    }


}

export function DeleteAlert(settings) {
    new DeleteAlertClass(settings);
}
