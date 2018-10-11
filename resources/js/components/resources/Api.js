import axios from 'axios';

export class Api {

    constructor (baseUrl) {
        
        this.baseUrl = null;
        this._setBaseUr(baseUrl);

    }

    initialize () {
        
        let instance = axios.create();
        
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

}