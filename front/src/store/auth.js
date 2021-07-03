export default {
  state: {
    user: {
      auth: localStorage.getItem("id") && localStorage.getItem("hash"),
      id: localStorage.getItem("id") || false,
      hash: localStorage.getItem("hash") || false,
    },
  },
  getters: {
    getUser(state) {
      return state.user;
    },
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
    },
  },
  actions: {
    async auth(context, type = "signin", formData) {
      const res = await fetch(
        process.env.VUE_APP_API_SERVER + "/Auth/?t=" + type,
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json;charset=utf-8",
          },
          body: JSON.stringify(formData),
        }
      );

      const data = await res.json();

      if (data.auth) {
        localStorage.setItem("id", data.id);
        localStorage.setItem("hash", data.hash);

        context.commit("setUser", { auth: true, id: data.id, hash: data.hash });

        return true;
      }

      return data; // data.error
    },
  },
};
