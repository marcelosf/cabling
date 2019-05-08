<template>
    <li>
        <a class="dropdown-trigger" href="#!" data-target="dropdown-user">
            {{ user.name }}
            <i class="material-icons right">arrow_drop_down</i>
            <i class="material-icons left">account_circle</i>
        </a>
        <ul id="dropdown-user" class="dropdown-content">
            <li>Item One</li>
        </ul>
    </li>
</template>

<script>
export default {

    props: ['username'],

    mounted () {
        this.initialize()
    },

    data () {
        return {
            user: {
                name: this.username
            }
        }
    },

    methods: {

        initialize () {
            let element = $('.dropdown-trigger');
            let instance = M.Dropdown.init(element, {
                coverTrigger: false
            });
        }

    }
    
}
</script>
