<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12">

                       <input id="name" class="col s12" type="text" v-model="form.name">
                       <label for="name">Nome</label>

                   </div>

                   <div class="input-field col s12">

                       <input type="text" id="size" class="col s12" v-model="form.size">
                       <label for="size">Tamanho</label>

                   </div>

                   <div class="input-field col s12">

                       <localcombo-component v-model="form.local_id"></localcombo-component>
                       
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
    import {RackResource} from '../resources/RackResource';
    import {Messages} from '../mixins/Messages.mixin';
    import LocalComboComponent from './LocalComboComponent';

    export default {

        props:  ['resource'],
        mixins: [Messages],

        data () {

            return {

                form: {
                    name: '',
                    size: '',
                    local_id: null
                },

            }

        },

        methods: {

            store () {
                console.log(this.form);
                this.getResource().create(response => {

                    this.showMessage(response.message);

                }, this.form);

            },

            update (id) {

                this.getResource().update(response => {

                    this.showMessage(response.message);

                }, this.form, id);

            },

            getResource () {

                return RackResource;

            },

        },

        components: {
            'localcombo-component': LocalComboComponent
        }
        
    }
</script>