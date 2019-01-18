<template>
    
    <div>
        <a href="#" class="dropdown-trigger btn-flat btn-large" data-target="dropdown-search" id="dropdown-search-button">
            Busca <i class="material-icons right" >search</i>
        </a>

        <div class="dropdown-content" id="dropdown-search">

            <div class="container">

                <div class="row">

                    <div class="input-field col s4">

                        <label for="search-build">Nome</label>
                        <input type="text" v-model="rackDataSearch.name" name="build" id="search-build">

                   </div>

                    <div class="input-field col s4">

                        <label for="search-local">Bloco</label>
                        <input type="text" v-model="local" name="search-local" id="search-local">

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

    import {RackResource} from '../resources/RackResource';
    import {SearchFilter} from '../mixins/SearchFilter.mixin';

    export default {

        mixins: [SearchFilter],

        mounted () {

            this.initialize();

        },

        data () {

            return {

                rackDataSearch: {

                    name: '',
                    local_id: ''

                },

                local: ''

            }

        },

        watch: {

            local (value) {
                this.getLocal(response => {
                    if(response.data.length > 0) {
                        this.rackDataSearch.local_id = response.data[0].id;
                    }
                }, value);
            }

        },

        methods: {

            searchFor () {

                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.rackDataSearch);
                }, this.rackDataSearch);

            },

            list (action, search) {

                RackResource.index(action, 1, search);

            },

            clear () {

                this.clearRackDataSearch();
                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.rackDataSearch);
                });

            },

            clearRackDataSearch () {

                this.rackDataSearch.name = '';
                this.local = '';

            }

        }

    }
</script>
