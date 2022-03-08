require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Icon from "@/Icons/Icon";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .component('icon',Icon)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });



// // Some random colors "#1C658C", "#398AB9", "#F1D00A", "#FF008E", "#FE7E6D"
// const colors = ["#fff"];

// const numBalls = 50;
// const balls = [];

// for (let i = 0; i < numBalls; i++) {
//   let ball = document.createElement("div");
//   ball.classList.add("z-0");
//   ball.classList.add("ball");
//   ball.style.background = colors[Math.floor(Math.random() * colors.length)];
//   ball.style.left = `${Math.floor(Math.random() * 100)}vw`;
//   ball.style.top = `${Math.floor(Math.random() * 100)}vh`;
//   ball.style.transform = `scale(${Math.random()})`;
//   ball.style.width = `${Math.random()}em`;
//   ball.style.height = ball.style.width;
  
//   balls.push(ball);
//   document.body.append(ball);
// }

// // Keyframes
// balls.forEach((el, i, ra) => {
//   let to = {
//     x: Math.random() * (i % 2 === 0 ? -11 : 16),
//     y: Math.random() * 12
//   };

//   let anim = el.animate(
//     [
//       { transform: "translate(0, 0)" },
//       { transform: `translate(${to.x}rem, ${to.y}rem)` }
//     ],
//     {
//       duration: (Math.random() + 1) * 2000, // random duration
//       direction: "alternate",
//       fill: "both",
//       iterations: Infinity,
//       easing: "ease-in-out"
//     }
//   );
// });
