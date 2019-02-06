<template>
    
    <div>
        <a href="#" class="dropdown-trigger btn-flat btn-large" data-target="dropdown-search" id="dropdown-search-button">
            Busca <i class="material-icons right" >search</i>
        </a>

        <div class="dropdown-content" id="dropdown-search">

            <div class="container">

                <div class="row">

                    <div class="input-field col s4">

                        <label for="search-port">Porta</label>
                        <input type="text" v-model="switchDataSearch.port_number" name="search-port" id="search-port">

                   </div>

                    <div class="input-field col s4">

                        <label for="search-switch">Switch</label>
                        <input type="text" v-model="switchDataSearch.switch_name" name="search-switch" id="search-switch">

                    </div>

                    <div class="input-field col s4">

                        <label for="search-stack">Pilha</label>
                        <input type="text" v-model="switchDataSearch.stack_name" name="search-stack" id="search-stack">

                    </div>
                    
                </div>

                <div class="row">

                    <button class="btn waves-effect col s3 left" @click="searchFor()">

                       Buscar <i class="material-icons right">search</i>

                    </button>

                    <button class="btn waves-effect col s3 white black-text right" @click="clear">

                       Limpar <i class="material-icons right">clear</i>

                    </button>

                </div>

            </div>

        </div>

    </div>
    
</template>

<script>

    import {SwitchPortResource} from '../resources/SwitchPortResource';
    import {SearchFilter} from '../mixins/SearchFilter.mixin';

    export default {

        mixins: [SearchFilter],

        mounted () {

            this.initialize();

        },

        data () {

            return {

                switchDataSearch: {

                    port_number: '',
                    switch_name: '',
                    stack_name: ''

                },

            }

        },

        methods: {

            searchFor () {

                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.switchDataSearch);
                }, this.switchDataSearch);

            },

            list (action, search) {

                SwitchPortResource.index(action, 1, search);

            },

            clear () {

                this.clearSwitchDataSearch();
                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.rackDataSearch);
                });

            },

            clearSwitchDataSearch () {

                this.switchDataSearch.port = '';
                this.switchDataSearch.switch = '';
                this.switchDataSearch.stack = '';

            }

        }

    }
</script>
