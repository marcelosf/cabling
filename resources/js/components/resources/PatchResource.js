import {Resource} from './Resource';

const ELEMENT = 'patches';

export class PatchResource extends Resource {

    static index (action, page, search, errors) {

        let query = this.generateQuery(search);

        let url = this.generateUrl(ELEMENT, page, query);

        this._getApi().get(url).then((response) => {

            action(response.data);

        }).catch(errors);

    }

    static create (action, form, errors) {

        this._getApi().post('racks', form).then(response => {

            action(response.data);

        }).catch(errors);

    }

    static update (actions, form, id, errors) {

        this._getApi().put('racks/' + id, form).then(response => {

            actions(response.data);

        }).catch(errors);

    }

    static show (actions, id, errors) {

        this._getApi().get('racks/' + id).then(response => {

            actions(response.data);

        }).catch(errors);

    }

}