<template>
    
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

</template>

<script>
    import {LocalResource} from '../resources/LocalResource';

    export default {

        mounted () {

            this.list(response => {

                this.locals = response.data.data;

            }, 1);

        },

        data () {

            return {
                
                locals: [],
                baseUrl: process.env.MIX_API_BASEURL

            }

        },

        methods: {

            list (action, page) {

                LocalResource.index(response => {

                    action(response);

                }, page);

            }

        }
    }
</script>
