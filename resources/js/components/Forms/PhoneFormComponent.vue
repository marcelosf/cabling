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

                       <voicecombo-component 
                            v-model="form.voicepanel_id"
                            :rack_id="form.rack_id">
                        </voicecombo-component>

                   </div>

                   <div class="input-field col s12 m12">

                       <switchportcombo-component 
                            v-model="form.switchport_id"
                            :id="form.switchport_id"
                            :rack_id="form.voip_rack_id"
                            :switch_name="form.switchport_name"
                        ></switchportcombo-component>

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
    import VoicePortComboComponent from './VoicePortComboComponent';
    import SwitchPortComboComponent from './SwitchPortComboComponent';
    import SwitchPortComboComponentVue from './SwitchPortComboComponent.vue';

    export default {

        props:  ['resource', 'id'],
        mixins: [Messages],

        mounted () {
            
            if (this.resource === 'update') {

                this.getPhone(response => {
                    this.form.number = response.number;
                    this.form.category = response.category;
                    this.form.voicepanel_id = response.voicepanel_id;
                    this.form.switchport_id = response.switchport_id;
                    this.form.switchport_name = response.switchname;
                    this.form.rack_id = response.rack_id;
                    this.form.voip_rack_id = response.voip_rack_id;
                }, this.id);
            }

        },

        data () {

            return {

                form: {
                    number: '',
                    category: '',
                    voicepanel_id: '',
                    switchport_id: '',
                    rack_id: null,
                    voip_rack_id: null
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

        },

        components: {
            'voicecombo-component': VoicePortComboComponent,
            'switchportcombo-component': SwitchPortComboComponentVue
        }
        
    }
</script>