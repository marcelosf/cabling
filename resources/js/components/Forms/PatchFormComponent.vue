<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12">

                       <input id="label" class="col s12" type="text" v-model="form.label">
                       <label :class="activated" for="label">Referencia</label>

                   </div>

                   <div class="input-field col s12">

                       <input type="text" id="number" class="col s12" v-model="form.number">
                       <label :class="activated" for="number">Número</label>

                   </div>

                   <div class="input-field col s12">

                       <input type="text" id="switch_port" class="col s12" v-model="form.switch_port">
                       <label :class="activated" for="switch_port">Porta do Switch</label>

                   </div>

                   <div class="input-field col s12">

                       <rackcombo-component v-model="form.rack_id"></rackcombo-component>

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
    import {PatchResource} from '../resources/PatchResource';
    import {Messages} from '../mixins/Messages.mixin';
    import LocalComboComponent from './LocalComboComponent';
    import RackComboComponent from './RackComboComponent';

    export default {

        props:  ['resource', 'id'],
        mixins: [Messages],

        mounted () {
            
            if (this.resource === 'update') {

                this.getPatch(response => {

                    this.form.label = response.label;
                    this.form.number = response.number;
                    this.form.switch_port = response.switch_port.port_number;
                    this.form.rack_id = response.rack.id;
                    this.form.local_id = response.local.id;

                }, this.id);
            }

        },

        data () {

            return {

                form: {
                    label: '',
                    number: '',
                    switch_port: '',
                    rack_id: '',
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

                    this.showMessage(response.message); console.log(this.form);

                }, this.form, id);

            },

            getPatch (actions, id) {

                this.getResource().show(response => {
                    console.log(response.data.data);actions(response.data.data);
                }, id)

            },

            getResource () {

                return PatchResource;

            }

        },

        components: {
            'localcombo-component': LocalComboComponent,
            'rackcombo-component': RackComboComponent
        }
        
    }
</script>