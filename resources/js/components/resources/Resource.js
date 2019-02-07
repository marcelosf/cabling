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

  static extractMetaPagination (data)
  {   
      return {
        data: {
          data: data.data.data,
          count: data.data.meta.pagination.count,
          current_page: data.data.meta.pagination.current_page,
          per_page: data.data.meta.pagination.per_page,
          total: data.data.meta.pagination.total,
          last_page: data.data.meta.pagination.total_pages
        }
      }
  }

}