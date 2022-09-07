var api = wp.customize;
class StyxControl {
    constructor() {
        let control = this;
        console.log('styx slider');
        api.controlConstructor[this.name()]= api.Control.extend({
            ready() {
                const callback = () => {
                    if (this.skipSettingBindCheck) {
                        this.skipSettingBindCheck = false;
                        return;
                    }
                    this.render();
                }
                if(this.setting) {
                    this.setting.bind(callback)
                }

                this.render();
            },

            setValue(event) {
              //  if (_.isObject(value) || _.isArray(value)) {
              //     let value = encodeURIComponent(JSON.stringify(event.target.value));
              //  }
                let value = event.target.value;
                this.skipSettingBindCheck = true;
                this.setting.set(value);
            },

            render() {
                this.renderContent();
                this.mount();
            },

            mount() {
                let elements = document.querySelectorAll(control.selector());
                elements.forEach(element => {
                //    element.removeEventListener('change', this.setValue.bind(this));
                    element.addEventListener('change', this.setValue.bind(this));
                })
            }
        })


    }

    name() {
        return 'styx-slider';
    }

    selector() {
        return `.${this.name()}-control`
    }

    onChange(value) {

    }
}


    new StyxControl();


