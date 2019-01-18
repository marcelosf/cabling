import {LocalResource} from '../resources/LocalResource';

export const SearchFilter = {

    methods: {

        initialize () {

            let element = $('#dropdown-search-button');
            let instance = M.Dropdown.init(element, {
                closeOnClick: false,
                constrainWidth: false,
                coverTrigger: false
            });
    
        },
    
        commit (data) {
    
            this.$store.commit('table/tableData', data);
    
        },
    
        commitFilter (filter) {
    
            this.$store.commit('filter/searchParams', filter);
    
        },

        getLocal (actions, local) {

            if (local) {
                this.getResource().index(response => {
                    actions(response.data);
                }, 1, {build: local});
            }
        },

        getResource () {
            return LocalResource;
        }

    }

}