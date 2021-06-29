import { createStore } from "vuex";

import auth from "@/store/auth.js";

export default createStore({
  modules: {
    auth,
  },
});
