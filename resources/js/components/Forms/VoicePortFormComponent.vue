<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12 m12">

                       <input id="voiceport_number" class="col s12" type="text" v-model="form.voiceport_number">
                       <label :class="activated" for="voiceport_number">Número da Porta</label>

                   </div>

                   <div class="input-field col s12 m12">

                       <input id="central" class="col s12" type="text" v-model="form.central">
                       <label :class="activated" for="central">Central</label>

                   </div>

                   <div class="input-field col s12 m12">

                       <input id="distribution" class="col s12" type="text" v-model="form.distribution">
                       <label :class="activated" for="distribution">Distribuição</label>

                   </div>

                   <rackcombo-component v-model="form.rack_id"></rackcombo-component>

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
    
    import {VoicePortResource} from '../resources/VoicePortResource';
    import {Messages} from '../mixins/Messages.mixin';
    import RackComboComponent from './RackComboComponent';
    export default {

        props:  ['resource', 'id'],
        mixins: [Messages],

        mounted () {
            
            if (this.resource === 'update') {

                this.getVoicePort(response => {

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
                    voiceport_number: '',
                    central: '',
                    distribution: '',
                    rack_id: ''
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

            getVoicePort (actions, id) {

                this.getResource().show(response => {
                    actions(response.data.data);
                }, id)

            },

            getResource () {

                return VoicePortResource;

            }

        },

        components: {
            'rackcombo-component': RackComboComponent
        }
        
    }
</script>