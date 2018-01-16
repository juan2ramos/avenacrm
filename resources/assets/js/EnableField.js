class EnableFieldClass {

    constructor(fields) {
        this.fields = fields;
        this.init();
    }

    init() {
        this.actionsClass(document.getElementsByClassName(this.fields), this.enableField)
    }

    enableField(e) {
        e.addEventListener('click', function () {
            document.getElementById(this.dataset.enable).disabled = !this.checked;
        })
    }

    actionsClass(array, callback, scope) {
        [].map.call(array, function (el) {
            callback.call(scope, el, array[el]);
        });
    };
}
export function EnableField(fields) {
    new EnableFieldClass(fields);
}
