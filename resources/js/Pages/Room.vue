<template>
    <div class="grid grid-cols-4">
        <div class="left col-span-3 min-h-screen grid content-between">
            <div class="flex-col justify-center">
                <div class="flex justify-center">
                    <div class="mt-8">
                        <button
                            class="mx-3 bg-blue-600 hover:bg-blue-500 p-3 rounded-md"
                        >
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
                        <button
                            class="bg-red-600 hover:bg-red-500 p-3 rounded-md"
                        >
                            <icon
                                name="exit"
                                class="text-white w-8 h-8 fill-current"
                            ></icon>
                        </button>
                    </div>
                </div>
                <div class="my-4">
                    <div class="flex justify-center align-center">
                        <video
                            :class="{ hidden: camera === false }"
                            class="shadow-sm rounded-md shadow-white drop-shadow-sm bg-slate-900"
                            autoplay
                            playsinline
                            style="max-height: 480px; max-width: 640px"
                        >
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
            <div class="text-white">
                <span>Name: {{ user.name }}</span
                ><br />
                <span>myId: {{ user.id }}</span
                ><br />
                <span>online users ids: <span> </span></span>
            </div>
            <div class="flex items-end justify-center">
                <div v-for="(member, index) in roomMembers" :key="index"
                    class="mb-6 mx-1 border-2 border-sky-400 shadow-lg shadow-cyan-500/50 drop-shadow-md"
                >
                    <h1 class="text-white text-center">{{ member.user.name }}</h1>
                    <img
                        class="hover:brightness-50 w-20 h-20"
                        src="http://127.0.0.1:8000/images/avatar.png"
                        alt=""
                    />
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
                <icon
                    class="w-8 h-6 text-white fill-current"
                    name="expand"
                ></icon>
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
                    <icon
                        class="w-8 h-6 text-white fill-current"
                        name="expand"
                    ></icon>
                </button>
                <button
                    class="px-4 shadow-sm shadow-cyan-500/50 drop-shadow-sm text-white text-lead py-2 rounded-sm mx-1"
                >
                    Button1
                </button>
                <button
                    class="px-4 shadow-sm shadow-cyan-500/50 drop-shadow-sm text-white text-lead py-2 rounded-sm mr-1"
                >
                    Button1
                </button>
                <button
                    class="px-4 shadow-sm shadow-cyan-500/50 drop-shadow-sm text-white text-lead py-2 rounded-sm"
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
import { reactive, ref, toRefs } from "@vue/reactivity";
import axios from "axios";
import { computed } from "@vue/runtime-core";
export default {
    props: {
        room: Object,
        roommates: Object,
        user: Object,
        flow: Array,
    },

    setup(props) {
        const { room, user, roommates, flow } = toRefs(props);
        let video = reactive({});
        let audioStream = ref([]);
        let cameraStream = ref([]);
        const audioConstraint = reactive({
            audio: true,
        });
        const videoConstraint = reactive({
            video: true,
        });

        let mic = ref(false);
        let camera = ref(false);
        let chatArea = ref(false);
        let roomMembers = ref([]);

        Echo.join(`room.${room.value.id}`)
            .here((users) => {
                axios
                    .post(
                        `/room/${room.value.id}/user/${user.value.id}/join`,
                        {}
                    )
                    .then((res) => {
                        console.log("user joined: ", res.data);
                    });
                users.forEach((user)=>{
                    roomMembers.value.push(user);
                });
                console.log('roommembers : ', roomMembers.value);
                console.log("Here: ", users);
            })
            .joining((user) => {
                roomMembers.value.push(user);
                console.log('users after new user joined', roomMembers.value);
                // api call to put the user in the chat room
                console.log("Joinning: ", user);
            })
            .leaving(({user}) => {


                // console.log('before leaving', roomMembers.value);

                roomMembers.value.map((roomMember, index) => {
                    if(roomMember.user.id == user.id){
                        roomMembers.value.splice(index,1);
                    }
                });
                console.log('after leaving', roomMembers.value);
                // api call to remove the user in the chat room
                axios
                    .post(`/room/${room.value.id}/user/${user.id}/left`, {})
                    .then((res) => {
                        console.log(res.data);
                    });
            })
            .listen("UserJoined", (userWhoJoined) => {
                console.log("User Joined Event is Fired", userWhoJoined);
            })
            .listen("UserLeft", (userWhoLeft) => {
                console.log("User Left Event Is Fired", userWhoLeft);
            })
            .error((error) => {
                console.error(error);
            });

        function kickUserOut(id) {
            axios
                .post(`/room/${room.value.id}/user/${id}/left`)
                .then((res) => {
                    console.log(
                        `this is ${id} left this room ${room.value.id}`,
                        `the response from the server ${res}`
                    );
                })
                .error((err) => {
                    console.log(err);
                });
        }

        function kickUsersOut(idsObj) {
            for (let key in idsObj) {
                kickUserOut(idsObj[key]);
                idsObj[key] = null;
            }
        }

        function returnMissingIds(channelIds, backendIds) {
            let copyOfBackendIds = backendIds;

            for (const key in channelIds) {
                if (channelIds[key] == backendIds[key]) {
                    copyOfBackendIds.shift(backendIds[key]);
                }
            }
            return copyOfBackendIds;
        }

        function updateOnlineIds(objectOfOnlineUsers) {
            let obj = Object.keys(
                Object.entries(objectOfOnlineUsers.value)[0][1]
            );
            onlineIds = [];
            for (let item in obj) {
                onlineIds.push(obj[item]);
            }
        }

        function updatebackendIds(backendRoomMembers) {
            for (let member in backendRoomMembers) {
                backendIds.push(Object.values(backendRoomMembers[member])[0]);
            }
        }
        function toggleCamera() {
            camera.value = !camera.value;
        }
        function toggleChatArea() {
            chatArea.value = !chatArea.value;
        }

        function toggleMic() {
            mic.value = !mic.value;
        }
        const getDevices = (kind = null) => {
            navigator.mediaDevices
                .enumerateDevices()
                .then(function (devices) {
                    return devices;
                })
                .catch(function (err) {
                    console.log(err.name + ": " + err.message);
                });
        };
        function openMic() {
            navigator.mediaDevices
                .getUserMedia(audioConstraint)

                .then((stream) => {
                    if (stream.active) {
                        audioStream.value = stream;
                        toggleMic();
                    }
                })
                .catch(function (err) {
                    console.log(err.name + ": " + err.message);
                });
        }

        const closeMic = () => {
            if (audioStream.value.active) {
                audioStream.value.getTracks().forEach((track) => {
                    if (track.kind === "audio") {
                        track.stop();
                    }
                });
                toggleMic();
            }
        };
        const openCamera = () => {
            navigator.mediaDevices
                .getUserMedia(videoConstraint)
                .then((stream) => {
                    if (stream.active) {
                        video.value = document.querySelector("video");
                        cameraStream.value = stream;
                        window.stream = stream;
                        video.value.srcObject = stream;
                        toggleCamera();
                    }
                })
                .catch(function (err) {
                    console.log(err.name + ": " + err.message);
                });
        };
        const closeCamera = () => {
            if (cameraStream.value.active) {
                cameraStream.value.getTracks().forEach((track) => {
                    if (track.kind === "video") {
                        track.stop();
                    }
                });
                toggleCamera();
            }
        };

        return {
            video,
            audioStream,
            cameraStream,
            audioConstraint,
            videoConstraint,
            mic,
            camera,
            chatArea,
            toggleCamera,
            toggleChatArea,
            toggleMic,
            getDevices,
            openMic,
            closeMic,
            openCamera,
            closeCamera,
            room,
            user,
            roommates,
            flow,
            updateOnlineIds,
            updatebackendIds,
            returnMissingIds,
            roomMembers,
        };
    }, // end of methods
};
</script>
