<template>
    <div>

        <div class="input-field col s6">
            <input v-model="build" type="text" id="build" class="autocomplete">
            <label>Bloco</label>
        </div>

        <div class="input-field col s6">
            <input v-model="local_id" type="text" id="local" class="autocomplete">
            <label>Local</label>
        </div>

    </div>
</template>

<script>
import {LocalResource} from '../resources/LocalResource';
export default {

    props: ['value'],

    mounted () {
        this.getList(response => {
            this.list = response;
        }, this.getResource());
    },

    data () {
        return {
            build: null,
            buildOptions: [],
            local_id: null,
            list: []
        }
    },

    watch: {

        list (value) {
            let options = _.map(this.list, (value, key, collection) => {
                let v = value.build;
                let k = value.id;
                return {[v.toString()]: k};
            });

            this.buildOptions = options;
        },

        buildOptions (value) {
            this.initialize('#build', value);
        }

    },

    methods: {

        initialize (el, options) {
            console.log(el)
            $(el).autocomplete({
                data: {
                    'Cacilds': null,
                    
                }
            });
        },

        getList (actions, resource) {
            resource.index(response => {
                actions(response.all);
            }, 1);
        },

        getResource () {
            return LocalResource;
        }

    }

}
</script>
