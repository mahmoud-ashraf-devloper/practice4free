<template>
  <Rooms :isAuthenticated="isAuthenticated" :rooms="rooms"> </Rooms>
</template>

<script>
import HomeLayout from "@/Layouts/HomeLayout";
import { Link } from "@inertiajs/inertia-vue3";
import Rooms from "@/Pages/Components/Rooms";
import { ref, toRefs, computed } from "vue";
import axios from 'axios';

export default {
  props: {
    rooms: Array,
    user: Object,
  },
  layout: HomeLayout,
  components: {
    Link,
    Rooms,
  },
  setup(props) {
    const { rooms, user } = toRefs(props);

    let showModal = ref(false);
    
    const isAuthenticated = computed(() => {
      return user.value ? true : false;
    });


    

    function toggleModal() {
      showModal.value = !showModal.value;
    }
    return {
      rooms,
      user,
      isAuthenticated,
      toggleModal,
      
    };
  },
};
</script>
