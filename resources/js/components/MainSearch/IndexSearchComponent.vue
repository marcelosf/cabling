<template>
    
    <div>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Local</th>
                    <th>Ponto</th>
                    <th>Hostname</th>
                    <th>IP</th>
                    <th>Switch</th>
                    <th>Porta Switch</th>
                    <th>Sala Rack</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="patch in patches" :key="patch.id" @click="click(patch.id)">
                    <td>{{ patch.local.build }}-{{ patch.local.local }}</td>
                    <td>{{ patch.label }}</td>
                    <td v-if="patch.switch_port">{{ patch.switch_port.stack_name }}</td>
                    <td v-if="patch.switch_port">{{ patch.switch_port.stack_ip }}</td>
                    <td v-if="patch.switch_port">{{ patch.switch_port.switch_name }}</td>
                    <td v-if="patch.switch_port">{{ patch.switch_port.port_number }}</td>
                    <td>{{ patch.rack_local.build }}-{{ patch.rack_local.local }}</td>
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
                console.log(this.$store.getters['table/tableData']);
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

            click (id) {
                let url = 'main-search/' + id;
                window.location.href = url;
            },

            getResource () {
                return PatchResource;
            },

        },

        components: {
            'pagination': PaginationComponent,
        }
    }
</script>
