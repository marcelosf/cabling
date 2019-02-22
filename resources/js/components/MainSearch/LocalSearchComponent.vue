<template>
    <div class="row">
        <div class="col s3" v-for="local in localList" :key="local.id">
            <div class="card hoverable">
                <div class="card-content">
                    <div class="card-title">
                        <a href="#">
                               {{ local.build }}-{{ local.local }}
                               <i class="material-icons right">more_vert</i>
                        </a>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">
                        <i class="material-icons right">save_alt</i>Racks
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {LocalResource} from '../resources/LocalResource';

export default {
    
    mounted () {
        this.getLocals(response => {
            this.localList = response;
        }, this.getResource());
    },

    data () {
        return {
            localList: []
        }
    },

    methods: {

        getLocals (actions, resource) {
            resource.index(response => {
                actions(response.all);
            });
        },

        drillDown (id) {

        },

        getResource () {
            return LocalResource;
        }
    }

}
</script>
