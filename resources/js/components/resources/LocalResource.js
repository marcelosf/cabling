import {Resource} from './Resource';

const ELEMENT = 'locals';

export class LocalResource extends Resource {

    static index (action, page, search, errors) {

        let query = this.generateQuery(search);

        let url = this.generateUrl(ELEMENT, page, query);

        this._getApi().get(url).then((response) => {
console.log(url);
            action(response.data);

        }).catch(errors);

    }

    static create (action, form, errors) {

        this._getApi().post('locals', form).then(response => {

            action(response.data);

        }).catch(errors);

    }

    static update (actions, form, id, errors) {

        this._getApi().put('locals/' + id, form).then(response => {

            actions(response.data);

        }).catch(errors);

    }

}