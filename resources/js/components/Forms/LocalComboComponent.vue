<template>
    <div>

        <div class="input-field col s6">
            <select v-model="build">
                <option v-for="option in localList"  :key="option.id" :value="option.build">
                    {{ option.build }}
                </option>
            </select>
            <label>Bloco</label>
        </div>

        <div class="input-field col s6">
            <select  v-model="local" id="localSelect">
                <option v-for="option in localOptions" :key="option.id" :value="option.id">{{ option.local }}</option>
            </select>
            <label>Local</label>
        </div>

    </div>
</template>

<script>
import {LocalResource} from '../resources/LocalResource';
export default {

    props: ['value'],

    mounted () {

        this.loadSelectOptions (options => {
            this.initialize(options);
        });

    },

    data () {

        return {
            localList: [],
            build: '',
            local: '',
            localElement: null
        }

    },

    computed: {

        localOptions () {
            let filtered = this.getLocalByBuild(this.build, this.localList);
            setTimeout(() => {
                this.selectInit();
            }, 500);
            
            return filtered;
        }

    },

    watch: {

        value (value) {
            this.local_id = value;
        },

        local () {
            this.localOnChange();
        }

    },
    
    methods: {

        initialize(options) {

            this.localList = options;
            this.setLocalElement();
            this.setDefaultFormValues(this.localElement);

        },

        loadSelectOptions (actions) {
            
            this.getResource().index((response) => {
                actions(response.all);
            }, 1);

        },

        getResource () {

            return LocalResource;

        },

        getLocalByBuild (build, localList) {

            let filtered = _.filter(localList, l => {
                return l.build === build;
            });

            return filtered;

        },

        getLocalById (id) {

            let filtered = _.filter(this.localList, l => {
                return l.id === id;
            });

            return filtered[0];
        },

        selectInit () {

            let element = $('#localSelect');
            let instance = M.FormSelect.init(element);

        },

        localOnChange () {

            this.$emit('input', this.local);

        },

        setLocalElement () {

            this.localElement = this.getLocalById(this.value);

        },

        setDefaultFormValues (values) {

            if (typeof values !== 'undefined') {
                this.build = values.build;
                this.local = values.id;
            }
            
        }
    }

}
</script>
