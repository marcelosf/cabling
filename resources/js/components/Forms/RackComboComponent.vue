<template> 
    <div>
        <div class="input-field col s12">
            <select v-model="rack_id" @change="rackOnChange" id="rack" name="rack_id">
                <option v-for="rack in rackList" :key="rack.id" :value="rack.id">
                    {{ rack.name }}
                </option>
            </select>
            <label>Rack</label>
        </div>
    </div>
</template>

<script>

import {RackResource} from '../resources/RackResource';

export default {

    props: ['value'],
    
    mounted () {
        if (this.rackList.length === 0) {
            this.getRackList(response => {
                this.rackList = response;
                setTimeout(() => {
                    this.selectInit();
                }, 500)
            });
        }
    },

    watch: {
        value (value) {
            if (value) {
                this.rack_id = value;
            }
        }
    },

    data () {
        return {
            rackList: [],
            rack_id: null
        }
    },

    methods: {

        getRackList (actions) {
            this.getResource().index(response => {
                actions(response.all.data);
            });
        },

        getResource () {
            return RackResource;
        },

        rackOnChange () {
            this.$emit('input', this.rack_id);
        },

        selectInit () {
            let element = $('#rack');
            let instance = M.FormSelect.init(element);

            return instance;
        }

    }

}
</script>
