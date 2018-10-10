class tableFilter
{
    serializeFormValues(formId) {

        if (formId) {

            return $(formId).serialize();

        }
        
        return null;

    }

    getSearchUrl(serializedValues, path) {

        if (serializedValues) {

            let url = path + '?search=';
            
            url = url . this._extractUrlFrom(serializedValues);

            return url;

        }

        return null;

    }

    _extractUrlFrom(serializedValues) {

        return serializedValues.replace('=', ':').replace('&', ';');

    }

}