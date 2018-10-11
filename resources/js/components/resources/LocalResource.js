import {Resource} from './Resource';

const ELEMENT = 'locals';

export class LocalResource extends Resource {

    static index (action, search, errors) {

        let query = this.generateQuery(search);

        this._getApi().get(ELEMENT + '?page=' + page + query).then((response) => {

            action(response.data);
            
        }).catch(errors);

    }

}