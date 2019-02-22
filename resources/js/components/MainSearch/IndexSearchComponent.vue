<template>
    <div>
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s2"><a href="#local">Local</a></li>
                    <li class="tab col s2"><a href="#rack">Rack</a></li>
                    <li class="tab col s2"><a href="#patch">Patch Panel</a></li>
                    <li class="tab col s2"><a href="#switch">Switch</a></li>
                    <li class="tab col s2"><a href="#voice">Voice Panel</a></li>
                    <li class="tab col s2"><a href="#phone">Telefones</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div id="local" class="col s12">
                <localsearch-component></localsearch-component>
            </div>
            <div id="rack" class="col s12">
                <racksearch-component></racksearch-component>
            </div>
            <div id="patch" class="col s12">
                Patch Panel
            </div>
            <div id="switch" class="col s12">
                Switch
            </div>
            <div id="voice" class="col s12">
                Voice panel
            </div>
            <div id="phone" class="col s12">
                Ramal
            </div>
        </div>
    </div>
</template>

<script>
import LocalSearchComponent from './LocalSearchComponent';
import RackSearchComponent from './RackSearchComponent';

export default {
    
    created () {
        this.initialize();
    },

    methods: {

        initialize () {
            let instance = $('.tabs');
            return M.Tabs.init(instance);
        }

    },

    components: {
        'localsearch-component': LocalSearchComponent,
        'racksearch-component': RackSearchComponent
    }

}
</script>
