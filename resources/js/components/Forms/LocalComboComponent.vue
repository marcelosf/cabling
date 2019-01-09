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
            this.localList = options;
        });

    },

    data () {

        return {
            localList: [],
            build: '',
            local: ''
        }

    },

    computed: {

        localOptions () {
            let filtered = this.getLocalByBuild(this.build, this.localList);
            
            setTimeout(() => {
                this.selectInit();
            }, 500);

            return filtered;
        },

    },

    watch: {

        local () {
            this.localOnChange();
        }

    },
    
    methods: {

        loadSelectOptions (actions) {
            
            this.getResource().index((response) => {
                actions(response.all);
            });

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

        selectInit () {

            let element = $('#localSelect');
            let instance = M.FormSelect.init(element);

        },

        localOnChange () {

            this.$emit('input', this.local);

        }

    }

}
</script>
