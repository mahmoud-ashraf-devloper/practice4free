<template>
  <div class="grid grid-cols-4">
    <div class="left col-span-3 min-h-screen grid content-between">
      <div class="flex justify-center">
        <div class="mt-8">
          <button class="mx-3 bg-blue-600 hover:bg-blue-500 p-3 rounded-md">
            <icon
              @click="closeMic"
              name="mic-on"
              :class="{ hidden: mic === false }"
              class="text-white w-8 h-8 fill-current"
            ></icon>
            <icon
              @click="openMic"
              name="mic-off"
              :class="{ hidden: mic === true }"
              class="text-white w-8 h-8 fill-current"
            ></icon>
          </button>
          <button
            class="mr-3 bg-blue-600 hover:bg-blue-500 p-3 rounded-md"
          >
            <icon
              @click="closeCamera"
              name="camera-on"
              :class="{ hidden: camera === false }"
              class="text-white w-8 h-8 fill-current"
            ></icon>
            <icon
                @click="openCamera"
              name="camera-off"
              :class="{ hidden: camera === true }"
              class="text-white w-8 h-8 fill-current"
            ></icon>
          </button>
          <button class="bg-red-600 hover:bg-red-500 p-3 rounded-md">
            <icon name="exit" class="text-white w-8 h-8 fill-current"></icon>
          </button>
        </div>
      </div>
      <div class="flex items-end justify-center">
        <div
          class="
            mb-6
            mx-1
            border-2 border-sky-400
            shadow-lg shadow-cyan-500/50
            drop-shadow-md
          "
        >
          <h1 class="text-white text-center">Bjorn</h1>
          <img class="hover:brightness-50 w-20 h-20" src="" alt="" />
        </div>
        <div
          class="
            mb-6
            mx-1
            border-2 border-sky-400
            shadow-lg shadow-cyan-500/50
            drop-shadow-md
          "
        >
          <h1 class="text-white text-center">Bjorn</h1>
          <img class="hover:brightness-50 w-20 h-20" src="" alt="" />
        </div>
        <div
          class="
            mb-6
            mx-1
            border-2 border-sky-400
            shadow-lg shadow-cyan-500/50
            drop-shadow-md
          "
        >
          <h1 class="text-white text-center">Bjorn</h1>
          <img class="hover:brightness-50 w-20 h-20" src="" alt="" />
        </div>
      </div>
    </div>
    <div
      :class="{ hidden: chatArea === false }"
      class="flex justify-end items-center"
    >
      <button
        @click="toggleChatArea"
        class="px-4 bg-blue-500 hover:bg-blue-400 rounded-sm"
      >
        <icon class="w-8 h-6 text-white fill-current" name="expand"></icon>
      </button>
    </div>
    <div
      class="right border-l-2 border-blue-500 min-h-screen flex-row"
      :class="{ hidden: chatArea }"
    >
      <div class="mt-1 mb-2 flex justify-center">
        <button
          @click="toggleChatArea"
          class="px-4 bg-blue-500 hover:bg-blue-400 rounded-sm"
        >
          <icon class="w-8 h-6 text-white fill-current" name="expand"></icon>
        </button>
        <button
          class="
            px-4
            shadow-sm shadow-cyan-500/50
            drop-shadow-sm
            text-white text-lead
            py-2
            rounded-sm
            mx-1
          "
        >
          Button1
        </button>
        <button
          class="
            px-4
            shadow-sm shadow-cyan-500/50
            drop-shadow-sm
            text-white text-lead
            py-2
            rounded-sm
            mr-1
          "
        >
          Button1
        </button>
        <button
          class="
            px-4
            shadow-sm shadow-cyan-500/50
            drop-shadow-sm
            text-white text-lead
            py-2
            rounded-sm
          "
        >
          Button1
        </button>
      </div>
      <div class="self-center h-4/5 text-white"></div>
      <div class="self-end border-t-2 border-blue-300">
        <textarea
          rows="3"
          placeholder="Type Something ..."
          class="w-full border-0 text-gray-200 focus:outline-none bg-gray-900"
          name="chat"
          id=""
        ></textarea>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "@vue/runtime-core";

export default {
  props: {},
  data() {
    return {
      audioStream: [],
      cameraStream: [],
      audioConstraint: {
        audio: true,
      },
      videoConstraint: {
        video: true,
      },
      mic: false,
      camera: false,
      chatArea: false,
    };
  },
  methods: {
    toggleCamera() {
      this.camera = !this.camera;
    },
    toggleChatArea() {
      this.chatArea = !this.chatArea;
    },
    toggleMic() {
      this.mic = !this.mic;
    },
    getDevices(kind = null) {
      navigator.mediaDevices
        .enumerateDevices()
        .then(function (devices) {
          return devices;
        })
        .catch(function (err) {
          console.log(err.name + ": " + err.message);
        });
    },
    openMic() {
      navigator.mediaDevices
        .getUserMedia(this.audioConstraint)

        .then((stream) => {
          if (stream.active) {
            this.toggleMic();
            this.audioStream = stream;
          }
        })
        .catch(function (err) {
          console.log(err.name + ": " + err.message);
        });
    },

    closeMic() {
      if (this.audioStream.active) {

        this.audioStream.getTracks().forEach(track => {
            if(track.kind === 'audio'){
                track.stop();
            }
        });
        this.toggleMic();
      }

    },
    openCamera() {
      navigator.mediaDevices
        .getUserMedia(this.videoConstraint)

        .then((stream) => {
          if (stream.active) {
            this.toggleCamera();
            this.cameraStream = stream;
          }
        })
        .catch(function (err) {
          console.log(err.name + ": " + err.message);
        });
    },

    closeCamera() {
      if (this.cameraStream.active) {
        this.cameraStream.getTracks().forEach(track => {
            if(track.kind === 'video'){
                track.stop();
            }
        });
        this.toggleCamera();
      }

    },
  }, // end of methods
};
</script>
