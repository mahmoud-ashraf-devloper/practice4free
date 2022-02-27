<template>
    <Room v-for="room in rooms"> </Room>
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
