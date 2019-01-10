<template>
    
    <div>

        <table class="highlight">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Bloco</th>
                    <th>Sala</th>
                    <th>Detalhes</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="rack in racks" :key="rack.id">
                    <td>{{ rack.name }}</td>
                    <td>{{ rack.build }}</td>
                    <td>{{ rack.local }}</td>
                    <td>
                        <a :href="'/racks/' + racks.id">
                            <i class="material-icons">subject</i>
                        </a>
                    </td>
                    <td>
                        <a :href="'/racks/' + racks.id + '/edit'">
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
    import {RackResource} from '../resources/RackResource';
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

            racks () {
                console.log(this.$store.getters['table/tableData']);
                return this.$store.getters['table/tableData'];

            }

        },

        methods: {

            list (action, page) {

                RackResource.index(response => {
                    
                    action(response.data);

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
