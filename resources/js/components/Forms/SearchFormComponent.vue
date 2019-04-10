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
                            <input type="text" id="patch-port">
                            <label for="patch-port">Ponto</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" id="switch">
                            <label for="switch">Hostname</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" id="switch-port">
                            <label for="switch-port">Porta do switch</label>
                        </div>

                        <div class="input-field col s6">
                            <input type="text" id="rack">
                            <label for="rack">Sala do rack</label>
                        </div>

                        <localcombo-component v-model="local"></localcombo-component>

                    </form>
                </div>

                <div class="modal-footer">
                    <a href="#!" class="waves-effect btn-flat">Buscar</a>
                    <a href="#!" class="modal-close waves-effect btn-flat">Cancelar</a>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

import LocalComboComponent from './LocalComboComponent';

export default {
    
    mounted () {
        this.initialize();
    },

    data () {
        return {
            local: ''
        }
    },

    methods: {

        initialize () {
            this.initializeModal();
        },

        initializeModal() {
            let element = $('#search');
            return M.Modal.init(element);
        }

    },

    components: {
        'localcombo-component': LocalComboComponent
    }

}
</script>
