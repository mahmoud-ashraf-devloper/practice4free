<template>
    <div class="">
        <button class="relative" @click="toggleSetting()">
            <icon class="w-5 h-5 hover:text-gray-400 fill-current text-gray-300"  name="setting"></icon>
            <div :class="{hidden: !openSetting}" class="absolute bg-gray-900 shadow-sm scale-100 shadow-white w-20 px-3 mt-2 pt-1 rounded-md right-0 flex flex-col justify-center">
                <img src="https://via.placeholder.com/25" class="rounded-full mb-2" alt="">
                <h1 class="text-red-400">Group Owner</h1>
            </div>
        </button>
    </div>
</template>

<script>
    import {Link} from "@inertiajs/inertia-vue3";

    export default {
        components:{
          Link
        },
        props:{

        },
        data() {
            return {
                openSetting: false,
            }
        },
        methods: {
            toggleSetting(){
                console.log('button');
                this.openSetting = !this.openSetting;
            }
        }
    }
</script>
