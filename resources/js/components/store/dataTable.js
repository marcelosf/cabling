export const dataTable = {

    namespaced: true,   
    
    state: {

        data: []

    },

    mutations: {

        tableData (state, data) {

            state.data = data;

        }

    },

    getters: {

        tableData (state) {

            return state.data.data;

        },

        all (state) {

            return state.data;

        }

    }

}