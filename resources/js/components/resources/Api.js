import axios from 'axios';

export class Api {

    constructor (baseUrl) {
        
        this.baseUrl = null;
        this._setBaseUr(baseUrl);

    }

    initialize () {
        
        let instance = axios.create();

        instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        instance = this._setCsrfToken(instance);
        instance.defaults.baseURL = this.baseUrl;
        instance.defaults.timeout = 200000;

        return instance;
    }

    _setBaseUr (baseURL) {
        
        if (baseURL) {
            this.baseUrl = this.baseUrl;
            return true;
        }

        if (process.env.MIX_API_BASEURL) {

            this.baseUrl = process.env.MIX_API_BASEURL;

            return true;

        }
    }

    _setCsrfToken (instance) {
        
        let token = document.head.querySelector('meta[name="csrf-token"]');
        
        if (token) {
            instance.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        } else {
            console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
        }

        return instance;
    }

}