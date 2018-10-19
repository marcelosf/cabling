import {LocalResource} from '../resources/LocalResource';

export default TableFilter = {

    methods: {

        filter (page, page) {

            LocalResource.index(response => {

                this.changeTableData(response.data);

            }, page, search);

        },

        changeTableData (data) {

            this.$store.commit('tableData', data);

        }

    }

}