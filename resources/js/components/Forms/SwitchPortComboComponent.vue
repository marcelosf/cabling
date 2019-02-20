<template>
    <div>
        <div class="col s4">
            <rackcombo-component v-model="rack"></rackcombo-component>
        </div>

        <div class="input-field col s4">
            <select name="switch" id="switch" v-model="switchName">
                <option v-for="s in switchList" :key="s.id" :value="s.switch_name">
                    {{ s.switch_name }}
                </option>
            </select>
            <label for="switch">Switch</label>
        </div>

        <div class="input-field col s4">
            <select name="switch-port-id" id="switch-port-id" v-model="portId" @change="portOnChange">
                <option v-for="p in portList" :key="p.id" :value="p.id">
                    {{ p.port_number }}
                </option>
            </select>
            <label for="switch-port-id">Porta do switch</label>
        </div>

    </div>
</template>

<script>

import RackComboComponent from './RackComboComponent';
import {SwitchPortResource} from '../resources/SwitchPortResource';

export default {
    
    props:['rack_id', 'value', 'switch_name'],

    data () {
        return {
            rack: null,
            switchName: '',
            portId: '',
            switchList: [],
            portList: [],
            switchPort: null
        }
    },

    watch: {

        rack_id (value) {
            this.rack = value;
        },

        value (value) {
            this.portId = value;
        },

        switch_name (value) {
            this.switchName = value;
        },

        rack (value) {
            this.getList(response => {
                this.switchList = response;
                setTimeout(() => {
                    this.selectInit('#switch');
                }, 500);
            }, {rack_id: value}, this.getResource());
        },

        switchName (value) {
            setTimeout(() => {
                this.portList = this.filterPorts(value);
                setTimeout(() => {
                    this.selectInit('#switch-port-id');
                }, 500);
            }, 500);
        }

    },

    methods: {

        getList (actions, search, resource) {
            resource.index(response => {
                actions(response.data.all.data);
            }, 1, search);
        },

        getSwitchPort (actions, id, resource) {
            resource.show(response => {
                actions(response.data.data);
            }, id);
        },
        
        filterPorts (switchName) {
            return _.filter(this.switchList, (item) => {
                return item.switch_name === switchName;
            });
        },

        getSwitchPortById (id) {
            if (this.switchList) {
                return _.filter(this.switchList, (item) => {
                    return item.id = id; 
                });
            }
        },

        getResource () {
            return SwitchPortResource;
        },

        selectInit (id) {
            let element = $(id);
            let instance = M.FormSelect.init(element);
        },

        portOnChange() {
            this.$emit('input', this.portId);
        }

    },

    components: {
        'rackcombo-component': RackComboComponent
    }

}
</script>
