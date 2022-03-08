<template>

        <div class="rounded-md p-2 mx-4 bg-slate-900 shadow-sm shadow-blue-600 border-r-2 border-l-2 border-blue-600">
            <div class="info flex justify-between mx-4 my-4">
                <div class="left flex">
                    <img class="rounded-full w-12 h-12 mr-2 border-2 border-slate-400" src="https://countryflagsapi.com/png/xk" alt="">
                    <div>
                        <h1 class="text-white font-bold">Any level</h1>
                        <h1 class="text-gray-500">English</h1>
                    </div>
                </div>
                <div class="right">
                    <DropDown></DropDown>
                </div>
            </div>
            <div class="room-users grid grid-cols-6 py-4 px-3 justify-items-center">
                <div class="user mr-2 ">
                    <Link><img class="rounded-full border-2 border-blue-300" src="https://lh3.googleusercontent.com/a-/AOh14GixNvmBgSmgMFlQ9nApEB4DSArBSuUvzGz9j3hoFg" alt=""></Link>
                </div>
                <div class="user mr-2 ">
                    <Link><img class="rounded-full border-2 border-blue-300" src="https://lh3.googleusercontent.com/a-/AOh14GixNvmBgSmgMFlQ9nApEB4DSArBSuUvzGz9j3hoFg" alt=""></Link>
                </div>
                <div class="user mr-2 ">
                    <Link><img class="rounded-full border-2 border-blue-300" src="https://lh3.googleusercontent.com/a-/AOh14GixNvmBgSmgMFlQ9nApEB4DSArBSuUvzGz9j3hoFg" alt=""></Link>
                </div>
            </div>
            <div class="flex justify-center items-end mt-4 b-1">
                <button type="button" class="w-48  text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Join Room</button>
            </div>
        </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import DropDown from "@/Pages/Components/DropDown";
export default {
    components: {
      Link,
      DropDown,
    },
    props: {
        user:Object
    },
    data() {
        return {
            open: false,
        }
    },
    methods: {
        toggleNavbar: function(){
            this.open = !this.open;
        }
    },
}
</script>
