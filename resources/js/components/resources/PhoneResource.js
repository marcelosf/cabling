import {Resource} from './Resource';

const ELEMENT = 'phones';

export class PhoneResource extends Resource {

    static index (action, page, search, errors) {

        let query = this.generateQuery(search);

        let url = this.generateUrl(ELEMENT, page, query);

        this._getApi().get(url).then((response) => {

            let extracted = this.extractMetaPagination(response.data);

            action(extracted);

        }).catch(errors);

    }

    static create (action, form, errors) {

        this._getApi().post(ELEMENT, form).then(response => {

            action(response.data);

        }).catch(errors);

    }

    static update (actions, form, id, errors) {

        this._getApi().put(ELEMENT + '/' + id, form).then(response => {

            actions(response.data);

        }).catch(errors);

    }

    static show (actions, id, errors) {

        this._getApi().get(ELEMENT + '/' + id).then(response => {

            actions(response.data);

        }).catch(errors);

    }

}