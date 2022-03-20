<template>
    <div>
        <div
            v-if="showModal"
            class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
            <div class="relative w-1/3 my-6 mx-auto max-w-8xl">
                <!--content-->
                <div
                    class="text-white bg-slate-800 border-2 border-gray-400 rounded-xl shadow-lg relative flex flex-col w-full outline-none focus:outline-none"
                >
                    <!--header-->
                    <div
                        class="flex-row items-center justify-center p-5 rounded-t"
                    >
                        <h3 class="text-3xl font-semibold tex">
                            Create New Room
                        </h3>
                        <hr class="bg-gray-600 w-full block self-center mt-3" />
                        <button
                            class="bg-red-600 px-3 py-1 rounded-lg rounded-bl-3xl absolute right-0 top-0"
                            @click="toggleModal"
                        >
                            <span class=""> × </span>
                        </button>
                    </div>
                    <form
                        @submit="createRoom"
                        id="creatNewRoomForm"
                        method="post"
                    >
                        <!--body-->
                        <div class="relative p-6 flex-row">
                            <div class="flex justify-between">
                                <input
                                    class="w-1/2 text-slate-900 bg-gray-50 border-0 rounded-md"
                                    type="text"
                                    name="title"
                                    v-model="formData.title"
                                    placeholder="Title ..."
                                />

                                <select
                                    class="w-36 text-slate-900 border-0 rounded-md mx-1"
                                    id=""
                                    name="lalanguage_id"
                                    v-model="formData.language_id"
                                >
                                    <option selected disabled>language</option>
                                    <option value="1">English</option>
                                    <option value="2">Arbic</option>
                                    <option value="3">Frensh</option>
                                </select>

                                <select
                                    class="form-select text-slate-900 border-0 rounded-md"
                                    name="size"
                                    v-model="formData.size"
                                    id=""
                                >
                                    <option selected disabled>Size</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <input
                                class="w-full mt-2 text-slate-900 bg-gray-50 border-0 rounded-md mb-3"
                                name="topic"
                                v-model="formData.topic"
                                type="text"
                                placeholder="Topic ..."
                            />
                            <!-- errors -->
                            <div
                                v-for="(error, index) in formErrors"
                                :key="index"
                            >
                                <span class="text-red-600 font-bold">
                                    * {{ error }}</span
                                >
                            </div>
                        </div>
                        <!--footer-->
                        <div
                            class="flex justify-center items-center pb-4 rounded-b"
                        >
                            <button
                                class="uppercase text-white bg-gradient-to-r from-blue-500 via-blue-400 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:ring-blue-600 dark:focus:ring-blue-400 font-medium rounded-full px-6 py-3"
                                id="creatRoomBtn"
                                type="submit"
                            >
                                Creat Room
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div
            v-if="showModal"
            class="opacity-25 fixed inset-0 z-40 bg-black"
        ></div>
    </div>
</template>

<script>
import { reactive, ref } from "@vue/reactivity";
import axios from "axios";
export default {
    name: "CreatNewRoom",

    setup() {
        let showModal = ref(true);

        let formData = reactive({
            title: "",
            language_id: "",
            size: "",
            topic: "",
        });

        let formErrors = ref([]);

        const createRoom = (e) => {
            e.preventDefault();
            document.getElementById("creatRoomBtn").innerText =
                "Creating Room ...";

            axios
                .post("/room/create", formData)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        };

        const toggleModal = () => {
            showModal.value = !showModal.value;
        };
        return { showModal, toggleModal, formData, formErrors, createRoom };
    },
};
</script>
