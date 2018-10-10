export class TableFilter
{
    serializeFormValuesFrom(formId) {

        if (formId) {

            return $(formId).serializeArray();

        }
        
        return null;

    }

    getSearchUrlFrom(serializedValues, path) {

        if (serializedValues) {

            return this._extractQueriesFrom(serializedValues);

        }

        return null;

    }

    _extractQueriesFrom (serializedValues) {

        let query = '?search=';

        if (serializedValues) {

            serializedValues.forEach(element => {
                
                if (element.value) {

                    query = query + element.name + ':' + element.value + ';' 

                }

            });

        }

        return query;

    }

}