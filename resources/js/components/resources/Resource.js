import {Api} from './Api';

export class Resource {

  static _getApi () {

    return new Api().initialize();

  }

  static generateQuery (parameters) {

    if (parameters) {

      let search = '&search=';

      for (let property in parameters) {
        search = search + property + ':' + parameters[property] + ';';
      }

      return search;

    }

    return '';

  }

  static generateUrl (element, page, query) {
    
    if (page) {
      return element + '?page=' + page + query;
    }

    return element;
  }

}