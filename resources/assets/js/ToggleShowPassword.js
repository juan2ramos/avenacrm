class ToggleShowPasswordClass {

    constructor(settings) {
        this.settings = settings;
        this.init();
    }

    init() {

        const x = document.getElementById(this.settings.fieldId);
        document.getElementById(this.settings.controlId).addEventListener('click',function () {

            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        });
    }


}

export function ToggleShowPassword(settings) {
    new ToggleShowPasswordClass(settings);
}
