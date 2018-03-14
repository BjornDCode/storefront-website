import Errors from '../helpers/Errors';

export default class Form {

    constructor(data) {
        this.originalData = data;
        this.loading = false;
        this.completed = false;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }

    submit(requestType, url) {
        this.loading = true; 

        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data); 
                })
                .catch(error => {
                    this.onFail(error.response.data.errors);

                    reject(error.response.data.errors);
                })
        })
    }

    onSuccess(data) {

        this.loading = false;
        this.completed = true;
        this.reset();
    }

    onFail(errors) {
        this.loading = false;
        this.errors.record(errors || { server: 'Failed' })
    }

    post(url) {
        return this.submit('post', url);
    }

}
