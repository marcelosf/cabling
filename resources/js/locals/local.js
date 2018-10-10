import {TableFilter} from '../TableFilter';

$(document).ready(() => {

    $('#search-form').on('submit', function(event) {

        let tableFilter = new TableFilter();

        let serializedForm = tableFilter.serializeFormValuesFrom(this);

        let searchUrl = tableFilter.getSearchUrlFrom(serializedForm);

        window.location.href = searchUrl;

        event.preventDefault();

    });

});