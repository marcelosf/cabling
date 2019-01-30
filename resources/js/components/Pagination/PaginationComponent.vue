<template>
    
    <ul v-if="hasPage" class="pagination">
        
        <li :class="arrowLeftStatus"><a @click="previousPage()"><i class="material-icons">chevron_left</i></a></li>
        <li v-for="(element, index) in paginator" :key="index" :class="isActive(currentPage, element)">
            <a @click="paginate(element)">{{ element }}</a>
        </li>
        <li :class="arrowRightStatus"><a @click="nextPage()"><i class="material-icons">chevron_right</i></a></li>

    </ul>

</template>

<script>
    export default {

        props: ['resource'],

        computed: {

            pagination () {

                return this.$store.getters['table/all'];

            },

            dataResource () {

                return this.resource;

            },

            paginator () {

                let pages = Array(this.pagination.last_page).fill(null);
                let compressed = this.compress(pages, 8);

                return compressed;

            },

            hasPage () {

                return this.pagination.total > this.pagination.per_page;

            },

            arrowLeftStatus () {

                if (this.pagination.current_page === 1) {
                    return 'disabled';
                }

                return 'waves-effect';

            },

            arrowRightStatus () {

                if (this.pagination.current_page === this.pagination.last_page ) {
                    return 'disabled';
                }

                return 'waves-effect';

            },
            
            currentPage () {

                return this.pagination.current_page;

            },

            elements () {

                return this.pagination.data;

            },

            filter () {

                return this.$store.getters['filter/searchParams'];

            }

        },
        
        methods: {

            isActive (currentPage, key) {

                if (currentPage === key) {

                    return 'active';

                }

                return 'waves-effect';

            },

            nextPage () {

                let page = this.pagination.current_page + 1;

                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                } 

                this.paginate(page);

            },

            previousPage () {

                let page = this.pagination.current_page - 1;

                if (page < 1) {
                    page = 1;
                }

                this.paginate(page);

            },

            paginate (page) {

                if (!page) {
                    page = 1;
                }

                this.dataResource().index(response => {
                    this.$store.commit('table/tableData', response.data);
                }, page, this.filter);

            },

            compress (paginator, length) {

                let total = paginator.length;

                if (total > length) {
                    
                    if (this.currentPage > length - 1) {

                        return this._threePointsLeft(total, length);

                    }

                    return this._threePointsRight(total, length);

                }

                return this._fillPagination(total);

            },

            _threePointsRight (total, length) {

                let compressed = [];

                for (let i = 1; i <= length; i++) {
                        compressed.push(i);
                }

                compressed.push('...');
                compressed.push(total -1);
                compressed.push(total);

                return compressed;

            },

            _threePointsLeft (total, length) {

                let compressed = [1, 2, '...'];
                let hidden = total - length;
                
                for (let i = hidden + 1; i <= total; i++) {
                    compressed.push(i);
                }

                return compressed;
            },

            _fillPagination (numberOfPages) {

                let pages = [];

                for (let i = 1; i <= numberOfPages; i++) {
                    pages.push(i);
                }

                return pages;

            }

        }

    }
</script>
