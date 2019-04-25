<template>
    <div>
        <div class="z-depth-1">
            <div class="row">
                <span class="btn-large">Lista de Patch Panels</span>
                <a href="#search" class="btn btn-flat btn-large waves-effect modal-trigger right" dusk="search-button">
                    <i class="material-icons left">search</i>
                    Buscar
                </a>
            </div>
        </div>

        <div id="search" class="modal">
            <div class="modal-content">
                <h5>Buscar</h5>
                <div class="divider"></div>
                <div class="row">
                    <form class="col s12">
                        
                        <div class="input-field col s6">
                            <input v-model="form.patchport" type="text" id="patch-port">
                            <label for="patch-port">Ponto</label>
                        </div>

                        <div class="input-field col s6">
                            <input v-model="form.switch" type="text" id="switch">
                            <label for="switch">Hostname</label>
                        </div>

                        <div class="input-field col s6">
                            <input v-model="form.switchport" type="text" id="switch-port">
                            <label for="switch-port">Porta do switch</label>
                        </div>

                        <div class="input-field col s6">
                            <input v-model="form.rack" type="text" id="rack">
                            <label for="rack">Sala do rack</label>
                        </div>

                        <div class="input-field col s6">
                            <input v-model="form.build" type="text" id="build">
                            <label for="build">Bloco</label>
                        </div>

                        <div class="input-field col s6">
                            <input v-model="form.local" type="text" id="local">
                            <label for="local">Local</label>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <a dusk="send-button" href="#!" class="waves-effect btn-flat" @click="search" id="btn-search">Buscar</a>
                    <a dusk="form-clear" href="#!" class="waves-effect btn-flat" @click="clearForm">Limpar</a>
                    <a href="#!" class="modal-close waves-effect btn-flat">Cancelar</a>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

import {PatchResource} from '../resources/PatchResource';

export default {
    
    mounted () {
        this.initialize();
    },

    data () {
        return {
            form: {
                patchport: '',
                switch: '',
                switchport: '',
                rack: '',
                build: '',
                local: ''
            }
        }
    },

    methods: {

        initialize () {
            this.initializeModal();
        },

        search () {
            let search = this.createSearch(this.form);
            let errors = ''

            this.resource().index(response => {
                this.$store.commit('table/tableData', response.data);
            }, 1, search, errors, 'and');
        },

        initializeModal() {
            let element = $('#search');
            return M.Modal.init(element);
        },

        createSearch (form) {
            return {
                'label': form.patchport,
                'switchPort.stack_name': form.switch,
                'switchPort.port_number': form.switchport,
                'rack.local.local': form.rack,
                'local.build': form.build,
                'local.local': form.local
            }
        },

        clearForm () {
            console.log('test');
            this.form.patchport = '';
            this.form.switch = '';
            this.form.switchport = '';
            this.form.rack = '';
            this.form.build = '';
            this.form.local = '';
        },

        resource () {
            return PatchResource;
        }

    },

}
</script>
