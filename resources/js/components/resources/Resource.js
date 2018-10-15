import {Api} from './Api';

export class Resource {

  static _getApi () {

    return new Api().initialize();

  }

  static generateQuery (search) {

    return search ? '&search=' + search.parameter + ':' + search.value : '';

  }

}