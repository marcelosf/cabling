<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12">

                       <input id="build" class="col s12" type="text" v-model="form.build">
                       <label for="build">Bloco</label>

                   </div>

                   <div class="input-field col s12">

                       <input type="text" id="floor" class="col s12" v-model="form.floor">
                       <label for="floor">Andar</label>

                   </div>

                   <div class="input-field col s12">

                       <input type="text" id="local" class="col s12" v-model="form.local">
                       <label for="local">Local</label>

                   </div>

               </form>

           </div>

       </div>

       <div class="card-action">

           <button class="btn-flat blue-text waves waves-effect" @click="store">
               Enviar <i class="material-icons right">send</i>
           </button>

       </div>

   </div>

</template>

<script>
    import {LocalResource} from '../resources/LocalResource';
    import {Messages} from '../mixins/Messages.mixin';
    export default {

        props:  ['resource'],
        mixins: [Messages],

        data () {

            return {

                form: {
                    build: '',
                    floor: '',
                    local: ''
                },

            }

        },

        methods: {

            store () {

                this.getResource()[this.resource](response => {

                    this.showMessage(response.message);

                }, this.form);

            },

            getResource () {

                return LocalResource;

            },

        }
        
    }
</script>