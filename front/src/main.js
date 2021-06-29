import { createApp } from "vue";
import App from "./App.vue";

import "./registerServiceWorker";
import router from "./router";
import store from "./store";

import "@/css/vars.css";
import "@/css/helpers.css";
import "@/css/index.css";
import "material-design-icons/iconfont/material-icons.css";

const app = createApp(App)
  .use(store)
  .use(router)
  .mount("#app");
