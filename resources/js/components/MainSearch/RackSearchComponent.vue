<template>
    <div class="row">
        <div class="col s3" v-for="item in list" :key="item.id">
            <div class="card hoverable">
                <div class="card-content">
                    <div class="card-title">
                        <a href="#">
                               {{ item.name }}
                               <i class="material-icons right">more_vert</i>
                        </a>
                    </div>
                </div>
                <div class="card-action">
                    <a href="#">
                        <i class="material-icons right">save_alt</i>Patch Panels
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {RackResource} from '../resources/RackResource';

export default {
    
    mounted () {
        this.getList(response => {
            this.list = response;
        }, this.getResource());
    },

    data () {
        return {
            list: []
        }
    },

    methods: {

        getList (actions, resource) {
            resource.index(response => {
                actions(response);
            });
        },

        drillDown (id) {

        },

        getResource () {
            return RackResource;
        }
    }

}
</script>
