import { createRouter, createWebHistory } from "vue-router";
import store from "@/store/index.js";

const routes = [
  {
    path: "/",
    name: "Home",
    meta: { auth: true },
    component: () => import("@/views/Home.vue"),
  },
  {
    path: "/signin",
    name: "SignIn",
    meta: { auth: false },
    component: () => import("@/views/SignIn.vue"),
  },
  {
    path: "/signup",
    name: "SignUp",
    meta: { auth: false },
    component: () => import("@/views/SignUp.vue"),
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  const authRequired = to.matched.some((route) => route.meta.auth);

  if (authRequired) {
    if (!store.getters.getUser.auth) {
      return next("signup");
    }
  }

  next();
});

export default router;
