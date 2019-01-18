<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12">

                       <input id="name" class="col s12" type="text" v-model="form.name">
                       <label :class="activated" for="name">Nome</label>

                   </div>

                   <div class="input-field col s12">

                       <input type="text" id="size" class="col s12" v-model="form.size">
                       <label :class="activated" for="size">Tamanho</label>

                   </div>

                   <div class="input-field col s12">

                       <localcombo-component v-model="form.local_id"></localcombo-component>
                       
                   </div>

               </form>

           </div>

       </div>

       <div class="card-action">

           <button class="btn-flat blue-text waves waves-effect" @click="processData">
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

        props:  ['resource', 'id'],
        mixins: [Messages],

        mounted () {
            
            if (this.resource === 'update') {

                this.getRack(response => {

                    this.form.name = response.name;
                    this.form.size = response.size;
                    this.form.local_id = response.id;   

                }, this.id);
            }

        },

        data () {

            return {

                form: {
                    name: '',
                    size: '',
                    local_id: null
                },

            }

        },

        computed: {

            activated () {

                if (this.resource === 'update') {
                    return 'active'
                }

                return '';

            }

        },

        methods: {

            processData () {

                if (this.resource === 'update') {
                    this.update(this.id);
                    return 'updated';
                }

                this.store();

            },

            store () {
                
                this.getResource().create(response => {

                    this.showMessage(response.message);

                }, this.form);

            },

            update (id) {

                this.getResource().update(response => {

                    this.showMessage(response.message);

                }, this.form, id);

            },

            getRack (actions, id) {

                this.getResource().show(response => {
                    actions(response.data.data);
                }, id)

            },

            getResource () {

                return RackResource;

            }

        },

        components: {
            'localcombo-component': LocalComboComponent
        }
        
    }
</script>