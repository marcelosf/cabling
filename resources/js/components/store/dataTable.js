export const dataTable = {

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

        }

    }

}