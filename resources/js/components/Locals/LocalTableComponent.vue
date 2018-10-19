<template>
    
    <div>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Bloco</th>
                    <th>Andar</th>
                    <th>Sala</th>
                    <th>Detalhes</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="local in locals" :key="local.id">
                    <td>{{ local.build }}</td>
                    <td>{{ local.floor }}</td>
                    <td>{{ local.local }}</td>
                    <td>
                        <a :href="'/locals/' + local.id">
                            <i class="material-icons">subject</i>
                        </a>
                    </td>
                    <td>
                        <a :href="'/locals/' + local.id + '/edit'">
                            <i class="material-icons">edit</i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

        <pagination></pagination>

    </div>


</template>

<script>
    import {LocalResource} from '../resources/LocalResource';
    import PaginationComponent from '../Pagination/PaginationComponent';

    export default {

        mounted () {

            this.list(response => {

                this.commitTableData(response.data);

            }, 1);

        },

        data () {

            return {
                
                data: []

            }

        },

        computed: {

            locals () {

                return this.$store.getters['table/tableData'];

            }

        },

        methods: {

            list (action, page) {

                LocalResource.index(response => {

                    action(response);

                }, page);

            },

            commitTableData (data) {

                this.$store.commit('table/tableData', data);

            }

        },

        components: {
            'pagination': PaginationComponent
        }
    }
</script>
