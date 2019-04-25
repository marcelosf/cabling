<template>
    <div>

        <div class="input-field col s6">
            <select v-model="build" id="build">
                <option v-for="option in localList"  :key="option.id" :value="option.build">
                    {{ option.build }}
                </option>
            </select>
            <label>Bloco</label>
        </div>

        <div class="input-field col s6">
            <select  v-model="local_id" id="local">
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
            if (!this.value) {
                this.loadSelect('#build');
            }
        });

    },

    data () {

        return {
            localList: [],
            build: '',
            local: '',
            local_id: null,
            localElement: null
        }

    },

    computed: {

        localOptions () {
            let filtered = this.getLocalByBuild(this.build, this.localList);
            this.loadSelect('#local');
            
            return filtered;
        }

    },

    watch: {

        value (value) {
            this.local_id = value;
            let local = this.getLocalById(value);
            this.build = local.build;
            this.loadSelect('#build');
        },

        local_id () {
            this.localOnChange();
        }

    },
    
    methods: {

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

        loadSelect (el, timeout) {
            let t = timeout ? timeout : 0;
            let element = $(el);
            setTimeout(() => {
                M.FormSelect.init(element);
            }, timeout);
        },

        localOnChange () {

            this.$emit('input', this.local_id);

        }
    }

}
</script>
