<template>
    
    <div>
        <a href="#" class="dropdown-trigger btn-flat" data-target="dropdown-search">
            Busca <i class="material-icons left" >search</i>
        </a>

        <div class="dropdown-content" id="dropdown-search">

            <div class="container">

                <div class="row">

                    <div class="input-field col s4">

                        <label for="search-build">Bloco</label>
                        <input type="text" v-model="localDataSerch.build" name="build" id="search-build">

                   </div>
                    
                    <div class="input-field col s4">

                        <label for="search-floor">Andar</label>
                        <input type="text" v-model="localDataSerch.floor" name="floor" id="search-floor">

                    </div>

                    <div class="input-field col s4">

                        <label for="search-local">Local</label>
                        <input type="text" v-model="localDataSerch.local" name="search-local" id="search-local">

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

    import {LocalResource} from '../resources/LocalResource';
    export default {

        mounted () {

            this.initialize();

        },

        data () {

            return {

                localDataSerch: {

                    build: '',
                    floor: '',
                    local: ''

                }

            }

        },

        methods: {

            initialize () {

                $('.dropdown-trigger').dropdown({

                    closeOnClick: false,
                    constrainWidth: false

                });

            },

            searchFor () {

                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.localDataSerch);
                }, this.localDataSerch);

            },

            commit (locals) {

                this.$store.commit('table/tableData', locals);

            },

            commitFilter (filter) {

                this.$store.commit('filter/searchParams', filter);

            },

            list (action, search) {

                LocalResource.index(action, 1, search);

            },

            clear () {

                this.clearLocalDataSearch();
                this.list(response => {
                    this.commit(response.data);
                    this.commitFilter(this.localDataSerch);
                });

            },

            clearLocalDataSearch () {

                this.localDataSerch.build = '';
                this.localDataSerch.floor = '';
                this.localDataSerch.local = '';

            }

        }

    }
</script>
