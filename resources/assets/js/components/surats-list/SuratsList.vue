<template>
    <div class="container">
        <div class="row surats-list">
            <list-column :surats="first_third" :search="search"></list-column>
            <list-column :surats="second_third" :search="search"></list-column>
            <list-column :surats="third_third" :search="search"></list-column>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['surats', 'search'],
        computed: {
            first_third() {
                return this.surats.slice(0, Math.ceil(this.surats.length / 3));
            },
            second_third() {
                let first_third_length = this.first_third.length;
                let left_surats_length = this.surats.length - first_third_length;
                return this.surats.slice(first_third_length, first_third_length + Math.ceil(left_surats_length / 2));
            },
            third_third() {
                let first_n_second_length = this.first_third.length + this.second_third.length;
                return this.surats.slice(first_n_second_length);
            },
        },
    }
</script>
