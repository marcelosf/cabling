<template>
    
   <div class="card">

       <div class="card-content">

           <div class="row">

               <form class="col s12">

                   <div class="input-field col s12 m6">

                       <input id="port_number" class="col s12" type="text" v-model="form.port_number">
                       <label :class="activated" for="port_number">Número da Porta</label>

                   </div>

                   <div class="input-field col s12 m6">

                       <input type="text" id="vlan" class="col s12" v-model="form.vlan">
                       <label :class="activated" for="vlan">VLAN</label>

                   </div>

                   <div class="input-field col s12 m6">

                       <input type="text" id="switch-name" class="col s12" v-model="form.switch_name">
                       <label :class="activated" for="switch-name">Nome do Switch</label>

                   </div>

                   <div class="input-field col s12 m6">

                       <input type="text" id="switch-brand" class="col s12" v-model="form.switch_brand">
                       <label :class="activated" for="switch-brand">Marca do Switch</label>

                   </div>

                   <div class="input-field col s12 m6">

                       <input type="text" id="switch-code" class="col s12" v-model="form.switch_code">
                       <label :class="activated" for="switch-code">Patrimônio</label>

                   </div>

                   <div class="input-field col s12 m6">

                       <input type="text" id="stack-name" class="col s12" v-model="form.stack_name">
                       <label :class="activated" for="stack-name">Nome da Pilha</label>

                   </div>
                                
                   <div class="input-field col s12 m6">

                       <input type="text" id="stack-ip" class="col s12" v-model="form.stack_ip">
                       <label :class="activated" for="stack-ip">IP da Pilha</label>

                   </div>

                   <div class="col s12 m6">

                       <rackcombo-component v-model="form.rack_id"></rackcombo-component>

                   </div>

                   <div class="col s6">

                        <label>
                            <input type="checkbox" v-model="form.poe">
                            <span>POE</span>
                        </label>

                   </div>

                   <div class="col s6">
                       
                       <span class="left">POE Status</span>

                       <div class="switch center">
                            <label>
                                Off
                                <input type="checkbox" v-model="form.poe_status">
                                <span class="lever"></span>
                                On
                            </label>
                        </div>

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
    import {SwitchPortResource} from '../resources/SwitchPortResource';
    import {Messages} from '../mixins/Messages.mixin';
    import RackComboComponent from './RackComboComponent';
 
    export default {

        props:  ['resource', 'id'],
        mixins: [Messages],

        mounted () {
            
            if (this.resource === 'update') {

                this.getSwitchPort(response => {

                    this.form.poe = response.poe;
                    this.form.poe_status = response.poe_status;
                    this.form.port_number = response.port_number;
                    this.form.rack_id = response.rack_id;
                    this.form.stack_ip = response.stack_ip;
                    this.form.stack_name = response.stack_name;
                    this.form.switch_brand = response.switch_brand;
                    this.form.switch_code = response.switch_code;
                    this.form.switch_name = response.switch_name;
                    this.form.vlan = response.vlan;   

                }, this.id);
            }

        },

        data () {

            return {

                form: {
                    poe: '',
                    poe_status: '',
                    port_number: '',
                    rack_id: '',
                    stack_ip: '',
                    stack_name: '',
                    switch_brand: '',
                    switch_code: '',
                    switch_name: '',
                    vlan: ''
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

            getSwitchPort (actions, id) {

                this.getResource().show(response => { console.log(response);
                    actions(response.data.data);
                }, id)

            },

            getResource () {

                return SwitchPortResource;

            }

        },

        components: {
            'rackcombo-component': RackComboComponent
        }
        
    }
</script>