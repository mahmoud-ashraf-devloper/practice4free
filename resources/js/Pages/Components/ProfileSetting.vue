<template>
  <div class="relative z-50">
    <button
      @click="toggleProfileSetting"
      id="user-menu"
      class="
        flex
        items-center
        pr-3
        text-sm text-white
        transition
        duration-150
        ease-in-out
        focus:outline-none focus:shadow-solid
      "
    
      aria-label="User menu"
    >
      <img
        class="w-8 h-8 mr-2 rounded-full"
        :src="user.profile_photo_path"
        alt=""
      />

      Hi, {{user.name}}!

      <icon name="down" class="w-5 h-5 ml-2 text-center fill-current" :class="{hidden: isHidden === false}"></icon>
      <icon name="up" class="w-5 h-5 ml-2 text-center fill-current" :class="{hidden: isHidden === true}"></icon>
    </button>

    <div class="absolute w-full mt-4  bg-slate-200" :class="{ hidden: isHidden }">
        
        <button
          class="
            block
            w-full
            px-4
            py-2
            text-sm
            leading-5
            text-gray-700
            transition
            duration-150
            ease-in-out
            hover:bg-gray-100
            focus:outline-none focus:bg-gray-100
          "
          role="menuitem"
        >
          Settings
        </button>

        <slot />
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    Link,
  },
  props:{
      user: Object
  },
  
  data() {
    return {
      isHidden: true,
    };
  },
  methods: {
    toggleProfileSetting() {
      this.isHidden = !this.isHidden;
    },
  },
};
</script>
