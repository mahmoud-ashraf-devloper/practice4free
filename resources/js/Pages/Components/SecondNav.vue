<template>
    <div class="grid md:grid-cols-3 gap-4 md:mx-24 my-4">
        <button @click="emitShowModal" class="flex text-base justify-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg  px-6 mx-4 py-3">
                    Create New Room <icon class="w-6 h-6 ml-4 fill-current text-white" name="create"></icon>
        </button>
        <button class="flex text-base justify-center text-white bg-gradient-to-r from-blue-500 via-blue-900 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-600 dark:focus:ring-blue-900 font-medium rounded-lg mx-4 lg:mx-0 px-6 py-3">
            Join Us On Facebook <icon class="w-6 h-6 ml-4 fill-current text-white" name="facebook"></icon>
        </button>
        <button class="flex text-base justify-center text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg  px-6 mx-4 py-3">
            Support Us <icon class="w-6 h-6 ml-4 fill-current text-white" name="support"></icon>
        </button>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    components: {
      Link
    },
    
    setup(props, {emit}){
        const emitShowModal = () => {
            emit("showCreateNewRoomModal");
            
        };

        return {emitShowModal};
    },
}
</script>
