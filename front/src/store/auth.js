export default {
  state: {
    user: {
      auth: localStorage.getItem("id") && localStorage.getItem("hash"),
      id: localStorage.getItem("id") || "",
      hash: localStorage.getItem("hash") || "",
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

      localStorage.setItem("id", user.id);
      localStorage.setItem("hash", user.hash);
    },
  },
  actions: {
    exit(context) {
      context.commit("setUser", {
        auth: false,
        id: "",
        hash: "",
      });
    },
    async auth(context, args) {
      const res = await fetch(
        process.env.VUE_APP_API_SERVER + "/api/Auth/?t=" + args.type,
        {
          method: "POST",
          body: JSON.stringify(args.formData),
        }
      );

      const data = await res.json();

      if (data.auth) {
        context.commit("setUser", { auth: true, id: data.id, hash: data.hash });

        return true;
      }

      return data; // data.error
    },
  },
};
