export const dataFilter = {

    namespced: true,

    state :{

        search: {}

    },

    mutations: {

        searchParams (state, search) {

            state.search = search;

        }

    },

    getters: {

        searchParams (state) {

            return state.search;

        }
 
    }

}