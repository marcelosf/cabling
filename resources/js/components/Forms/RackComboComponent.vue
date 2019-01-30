<template> 
    <div>
        <div class="input-field col s12">
            <select v-model="rack_id" @change="rackOnChange">
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
        this.getRackList(response => {
            this.initialize(response);
        });
    },

    watch: {
        value (value) {
            this.rack_id = value;
        }
    },

    data () {
        return {
            rackList: [],
            rack_id: null
        }
    },

    methods: {

        initialize (rackList) {
            this.rackList = rackList;
        },

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
        }

    }

}
</script>
