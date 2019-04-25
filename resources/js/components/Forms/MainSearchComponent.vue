<template>
    <div>
        <div class="row">
            <a href="#" class="btn btn-flat waves-effect dropdown-trigger" data-target="search-dropdown">{{ this.title }}</a>

            <div class="dropdown-content" id="search-dropdown">
                <div class="container">
                    <div class="row">

                        <div class="col s12">
                            <div class="input-field">
                                <label for="search">{{ this.title + ' ' + this.test }}</label>
                                <input type="text" id="search" name="mainsearch-search">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: ['title', 'test'],

    mounted () {
        this.initialize();
    },

    methods: {
        initialize () {
            let dropdown = $('.dropdown-trigger');
            let instance = M.Dropdown.init(dropdown, {
                closeOnClick: false,
                constrainWidth: false,
                coverTrigger: false,
            });
        }
    }
}
</script>
