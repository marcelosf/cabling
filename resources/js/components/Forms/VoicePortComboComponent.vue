<template>
    <div>
        <div class="col s6">
            <rackcombo-component v-model="rack"></rackcombo-component>
        </div>

        <div class="input-field col s6">
            <select name="voicepanel_id" id="voiceport" @change="voiceOnChange" v-model="voiceport">
                <option v-for="option in list" :key="option.id" :value="option.id">
                    {{ option.voiceport_number }}
                </option>
            </select>
            <label for="voiceport">Porta Voice Panel</label>
        </div>
    </div>
</template>

<script>

import RackComboComponent from './RackComboComponent';
import {VoicePortResource} from '../resources/VoicePortResource';

export default {

    props: ['value', 'rack_id'],

    data () {
        return {
            list: [],
            rack: '',
            voiceport: ''
        }
    },

    watch: {
        
        rack (value) {
            this.getList(response => {
                this.list = response;
                setTimeout(() => {
                    this.selectInit();
                }, 500);
            }, this.getResource(), value);
        },

        value (value) {
            this.voiceport = value;
        },

        rack_id (value) {
            if (value) {
                this.rack = value;
            }
        }

    },

    methods: {

        getList (actions, resource, search) {
            resource.index(response => {
                actions(response.data.all.data);
            }, 1, {rack_id: search});
        },

        getResource () {
            return VoicePortResource;
        },

        selectInit () {
            let element = $('#voiceport');
            let instance = M.FormSelect.init(element);
        },

        voiceOnChange () {
            this.$emit('input', this.voiceport);
        },

    },

    components: {
        'rackcombo-component': RackComboComponent,
    }

}
</script>
