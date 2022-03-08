<template>
    <Room v-for='(room, index) in rooms' :key='index'> </Room>
</template>

<script>
    import HomeLayout from "@/Layouts/HomeLayout";
    import {Link} from '@inertiajs/inertia-vue3';
    import Room from "@/Pages/Components/Room";

    export default {
        props:{
            rooms: Array,
            user: Object
        },
        layout: HomeLayout,
        components: {
            Link,
            Room,
        },
        data () {
            return {

            }
        },
    };
</script>
