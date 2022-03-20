<template>
    <div>
        <section class="relative">
            <Navbar :user="user"></Navbar>
        </section>
        <main class="min-h-screen absolute z-2 w-full " >
            <SecondNav @show-create-new-room-modal="toggleCreateRoomModal"></SecondNav>
            <CreateNewRoomModal  v-if="showCreateNewRoomModal" />
            <div class="grid md:grid-cols-3 gap-4 md:mx-24">
                <slot />
            </div>
        </main>
    </div>
</template>

<script>
    import Navbar from "@/Pages/Components/Navbar";
    import SecondNav from "@/Pages/Components/SecondNav";
    import CreateNewRoomModal from "@/Pages/Components/CreateNewRoomModal";
    import { ref } from '@vue/reactivity';

    export default {
        props:{
            rooms: Array,
            user: Object
        },
        components:{
          Navbar, SecondNav, CreateNewRoomModal
        },
        setup(){
            let showCreateNewRoomModal = ref(false);

            const toggleCreateRoomModal = ()=>{
                showCreateNewRoomModal.value = !showCreateNewRoomModal.value;
            };

            return {showCreateNewRoomModal, toggleCreateRoomModal};
        },
        
    };
</script>
