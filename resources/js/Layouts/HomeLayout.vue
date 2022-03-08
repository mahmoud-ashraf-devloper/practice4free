<template>
    <div>

        <section class="relative">
            <Navbar :user="user"></Navbar>

        </section>
        <main class="min-h-screen absolute z-2 w-full">
            <SecondNav></SecondNav>
            <div class="grid md:grid-cols-3 gap-4 md:mx-24">
                <slot />
            </div>
        </main>
    </div>
</template>

<script>
    import Navbar from "@/Pages/Components/Navbar";
    import SecondNav from "@/Pages/Components/SecondNav";
    export default {
        props:{
            rooms: Array,
            user: Object
        },

        data: function (){
            return {
                 
            };
        },
        components:{
          Navbar, SecondNav
        },
    };
</script>
