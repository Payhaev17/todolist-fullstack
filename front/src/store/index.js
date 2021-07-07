import { createStore } from "vuex";

import auth from "@/store/auth.js";
import todos from "@/store/todos.js";

export default createStore({
  modules: {
    auth,
    todos,
  },
});
