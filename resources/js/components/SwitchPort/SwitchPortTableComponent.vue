<template>
    
    <div>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Porta</th>
                    <th>Switch</th>
                    <th>Pilha</th>
                    <th>Rack</th>
                    <th>Mais</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="port in ports" :key="port.id">
                    <td>{{ port.port_number }}</td>
                    <td>{{ port.switch_name }}</td>
                    <td>{{ port.stack_name }}</td>
                    <td>{{ port.rack }}</td>
                    <td>
                        <a :href="'/switch-port/' + port.id">
                            <i class="material-icons">subject</i>
                        </a>
                    </td>
                    <td>
                        <a :href="'/switch-port/' + port.id + '/edit'">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <pagination :resource="getResource"></pagination>

    </div>

</template>

<script>
import {SwitchPortResource} from '../resources/SwitchPortResource';
import PaginationComponent from '../Pagination/PaginationComponent';
export default {
    
    mounted () {

        this.list(response => {
            
            this.commitTableData(response);


        }, 1);

    },

    data () {

        return {
                
            data: []

        }

    },

    computed: {

        ports () {
                
            return this.$store.getters['table/tableData'];

        }

    },

    methods: {

        list (action, page) {

            this.getResource().index(response => {
                    
                action(response.data);

            }, page);

        },

        commitTableData (data) {

            this.$store.commit('table/tableData', data);

        },

        getResource () {

            return SwitchPortResource;

        }

    },

    components: {
        'pagination': PaginationComponent
    }
}
</script>
