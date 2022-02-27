<template>
    <div>
        <section class="relative">
            <Navbar :user="user"></Navbar>
        </section>
        <VueParticle domId='particle' :config=myConfig />
        <main class="min-h-screen absolute z-2">
            <div class="grid md:grid-cols-3 gap-4 mt-8 md:mx-24">
                <slot />
            </div>
        </main>
    </div>
</template>

<script>
    import Navbar from "@/Pages/Components/Navbar";
    import Vue from 'vue';
    import VueParticle from 'vue-particlejs';
    export default {
        props:{
            rooms: Array,
            user: Object
        },
        data: function (){
            return {
                myConfig:{
                    "particles": {
                        "number": {
                            "value": 19,
                            "density": {
                                "enable": true,
                                "value_area": 1183.7775129623642
                            }
                        },
                        "color": {
                            "value": "#d7d7d7"
                        },
                        "shape": {
                            "type": "polygon",
                            "stroke": {
                                "width": 0,
                                "color": "#000"
                            },
                            "polygon": {
                                "nb_sides": 8
                            },
                            "image": {
                                "src": "img/github.svg",
                                "width": 100,
                                "height": 100
                            }
                        },
                        "opacity": {
                            "value": 0.3,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 1,
                                "opacity_min": 0.1,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 160,
                            "random": false,
                            "anim": {
                                "enable": true,
                                "speed": 10,
                                "size_min": 40,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": false,
                            "distance": 200,
                            "color": "#ffffff",
                            "opacity": 1,
                            "width": 2
                        },
                        "move": {
                            "enable": true,
                            "speed": 8,
                            "direction": "none",
                            "random": false,
                            "straight": false,
                            "out_mode": "out",
                            "bounce": false,
                            "attract": {
                                "enable": false,
                                "rotateX": 600,
                                "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "grab"
                            },
                            "onclick": {
                                "enable": false,
                                "mode": "push"
                            },
                            "resize": true
                        },
                        "modes": {
                            "grab": {
                                "distance": 400,
                                "line_linked": {
                                    "opacity": 1
                                }
                            },
                            "bubble": {
                                "distance": 400,
                                "size": 40,
                                "duration": 2,
                                "opacity": 8,
                                "speed": 3
                            },
                            "repulse": {
                                "distance": 200,
                                "duration": 0.4
                            },
                            "push": {
                                "particles_nb": 4
                            },
                            "remove": {
                                "particles_nb": 2
                            }
                        }
                    },
                    "retina_detect": true
                }
            };
        },
        components:{
          Navbar, VueParticle
        },
    };
</script>
