<template>
    
    <div>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Referência</th>
                    <th>Local</th>
                    <th>Ponto</th>
                    <th>Mais</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="patch in patches" :key="patch.id">
                    <td>{{ patch.label }}</td>
                    <td>{{ patch.local_id }}</td>
                    <td>{{ patch.switch_port }}</td>
                    <td>
                        <a :href="'/patches/' + patch.id">
                            <i class="material-icons">subject</i>
                        </a>
                    </td>
                    <td>
                        <a :href="'/patches/' + patch.id + '/edit'">
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
    import {PatchResource} from '../resources/PatchResource';
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

            patches () {
                
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

                return PatchResource;

            }

        },

        components: {
            'pagination': PaginationComponent
        }
    }
</script>
