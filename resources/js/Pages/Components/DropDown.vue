<template>
    <div class="">
        <button class="relative" @click="toggleSetting()">
            <icon class="w-5 h-5 hover:text-gray-400 fill-current text-gray-300"  name="setting"></icon>
            <div :class="{hidden: !openSetting}" class="absolute bg-gray-900 shadow-lg shadow-cyan-500/50 w-20 px-3 mt-2 pt-1 rounded-md right-0 flex flex-col justify-center">
                <img src="https://lh3.googleusercontent.com/a-/AOh14GgyeSAl8Bc4WDZQPzNkQLrxxHN3DpSCYrv_P3mvxQ" class="rounded-full mb-2" alt="">
                <h1 class="text-red-400 text-sm">Group Owner</h1>
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
