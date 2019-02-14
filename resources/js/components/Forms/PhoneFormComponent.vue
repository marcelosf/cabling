<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12 m12">

                       <input id="number" class="col s12" name="number" type="text" v-model="form.number">
                       <label :class="activated" for="number">Número</label>

                   </div>

                   <div class="input-field col s12 m12">

                       <input id="category" class="col s12" name="category" type="text" v-model="form.category">
                       <label :class="activated" for="central">Categoria</label>

                   </div>

                   <div class="input-field col s12 m12">

                       <input id="voicepanel_id" class="col s12" type="text" name="voicepanel_id" v-model="form.voicepanel_id">
                       <label :class="activated" for="voicepanel_id">Voice Panel</label>

                   </div>

                   <div class="input-field col s12 m12">

                       <input id="switchport_id" class="col s12" type="text" name="switchport_id" v-model="form.switchport_id">
                       <label :class="activated" for="switchport_id">Porta do switch</label>

                   </div>

               </form>

           </div>

       </div>

       <div class="card-action">

           <button class="btn-flat blue-text waves waves-effect" dusk="send" @click="processData">
               Enviar <i class="material-icons right">send</i>
           </button>

       </div>

   </div>

</template>

<script>
    
    import {PhoneResource} from '../resources/PhoneResource';
    import {Messages} from '../mixins/Messages.mixin';

    export default {

        props:  ['resource', 'id'],
        mixins: [Messages],

        mounted () {
            
            if (this.resource === 'update') {

                this.getPhone(response => {

                    this.form.voiceport_number = response.voiceport_number;
                    this.form.central = response.central;
                    this.form.distribution = response.distribution;
                    this.form.rack_id = response.rack_id;   

                }, this.id);
            }

        },

        data () {

            return {

                form: {
                    number: '',
                    category: '',
                    voicepanel_id: '',
                    switchport_id: ''
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

            getPhone (actions, id) {

                this.getResource().show(response => {
                    actions(response.data.data);
                }, id)

            },

            getResource () {

                return PhoneResource;

            }

        }
        
    }
</script>