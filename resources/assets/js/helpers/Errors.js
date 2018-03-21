import { isEmpty } from 'lodash';

export default class Errors {

    constructor() {
        this.errors = {};
    }

    any() {
        const errors = Object.assign({}, this.errors);
        delete errors['server'];
        delete errors['card'];
        return !isEmpty(errors);
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        if (field) {
            delete this.errors[field];
            return; 
        }

        this.errors = {};
    } 

}
