<template>
    <Rooms :isAuthenticated="isAuthenticated"  :rooms="rooms"> </Rooms>
</template>

<script>
    import HomeLayout from "@/Layouts/HomeLayout";
    import {Link} from '@inertiajs/inertia-vue3';
    import Rooms from "@/Pages/Components/Rooms";
    import {ref, toRefs, computed} from 'vue';

    export default {
        props:{
            rooms: Array,
            user: Object
        },
        layout: HomeLayout,
        components: {
            Link,
            Rooms,
        },
        setup (props) {
            const {rooms, user} = toRefs(props);

            const isAuthenticated = computed(()=>{
                return (user.value) ? true:false;
            })
            return {
                rooms, user, isAuthenticated
            }
        },
    };
</script>
