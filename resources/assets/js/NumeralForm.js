    const numeral = require('numeral');

class NumeralFormClass {

    constructor(el) {
        this.el = el;
        this.init();
    }

    init() {
        if (this.el instanceof NodeList)
            return this.changeManyElements();
        this.changeElement(this.el)
    }

    changeManyElements() {
        for (let item of this.el) {
            this.changeElement(item);
        }
    }

    changeElement(el) {
        el.addEventListener('change', function () {
            this.value = numeral(this.value).format('$0,0.00');
        })
    }

}

export function NumeralForm(el) {
    new NumeralFormClass(el);
}
