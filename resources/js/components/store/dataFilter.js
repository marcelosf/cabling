export const dataFilter = {

    namespaced: true,

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