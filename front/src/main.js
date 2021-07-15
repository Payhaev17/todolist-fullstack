import { createApp } from "vue";

import "@/registerServiceWorker";

import App from "@/App.vue";
import router from "@/router";
import store from "@/store";

import "@/css/index.scss";
import "material-design-icons/iconfont/material-icons.css";

const app = createApp(App)
  .use(store)
  .use(router)
  .mount("#app");
