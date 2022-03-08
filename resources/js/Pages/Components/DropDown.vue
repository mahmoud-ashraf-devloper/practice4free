<template>
    <div class="">
        <button class="relative  shadow-sm shadow-blue-600" @click="toggleSetting()">
            <icon class="w-5 h-5 hover:text-gray-400 fill-current text-gray-300"  name="setting"></icon>
            <div :class="{hidden: !openSetting}" class="flex w-16 overflow-hidden absolute bg-slate-900  shadow-sm shadow-blue-600 rounded-md right-0 flex flex-col justify-center">
                <h1 class="bg-red-400 text-white  text-sm">Group Owner</h1>
                <img src="https://lh3.googleusercontent.com/a-/AOh14GgyeSAl8Bc4WDZQPzNkQLrxxHN3DpSCYrv_P3mvxQ" class="self-center rounded-full w-10 my-2" alt="">
                <h1 class="text-white  text-sm">Cold</h1>
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
