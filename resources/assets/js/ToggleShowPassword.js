class ToggleShowPasswordClass {

    constructor(settings) {
        this.settings = settings;
        this.onClick = this.togglePassword.bind(this);
        this.init();
    }

    init() {
        this.field = document.querySelector(this.settings.fieldId);
        const control = document.querySelector(this.settings.controlId);
        if (this.field && control) {
            control.addEventListener('click', this.onClick);
        }
    }

    togglePassword() {
        if (this.field.type === "password") {
            this.field.type = "text";
        } else {
            this.field.type = "password";
        }
    }
}

export function ToggleShowPassword(settings) {
    new ToggleShowPasswordClass(settings);
}
