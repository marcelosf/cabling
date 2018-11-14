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
                        <input type="text" name="build" id="search-build">

                   </div>
                    
                    <div class="input-field col s4">

                        <label for="search-floor">Andar</label>
                        <input type="text" name="floor" id="search-floor">

                    </div>

                    <div class="input-field col s4">

                        <label for="search-local">Local</label>
                        <input type="text" name="search-local" id="search-local">

                    </div>
                    
                </div>

                <div class="row">

                    <div class="btn waves-effect col s3 left">

                       Buscar <i class="material-icons right">search</i>

                    </div>

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

        methods: {

            initialize () {

                $('.dropdown-trigger').dropdown({

                    closeOnClick: false,
                    constrainWidth: false

                });

            },

            searchFor (local) {

                this.list(response => {
                    this.commit(local);
                }, local);

            },

            commit (locals) {

                this.$store.commit('table/tableData', locals);

            },

            list (action, search) {

                LocalResource.index(action, 1, search);

            }

        }

    }
</script>
