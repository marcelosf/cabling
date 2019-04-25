import {Api} from './Api';

export class Resource {

  static _getApi () {

    return new Api().initialize();

  }

  static generateQuery (parameters, searchJoin) {

    if (parameters) {

      let search = '&search=';

      for (let property in parameters) {
        if (parameters[property]) {
          search = search + property + ':' + parameters[property] + ';';
        }
      }

      search = search.substring(0, search.length -1);

      if (searchJoin === 'and') {
        search = search + '&searchJoin=and';
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
      let all = null;
      
      if (data.all) {
        all = data.all;
      }

      return {
        data: {
          data: data.data.data,
          all: all,
          count: data.data.meta.pagination.count,
          current_page: data.data.meta.pagination.current_page,
          per_page: data.data.meta.pagination.per_page,
          total: data.data.meta.pagination.total,
          last_page: data.data.meta.pagination.total_pages
        }
      }
  }

}