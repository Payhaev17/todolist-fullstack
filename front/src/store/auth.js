export default {
  state: {
    user: {
      id: localStorage.getItem("id") || false,
      hash: localStorage.getItem("hash") || false,
    },
  },
  getters: {
    getUser(state) {
      return state.user;
    },
  },
  mutations: {},
  actions: {
    async signup(context, formData) {
      const res = await fetch(process.env.VUE_APP_API_SERVER + "/Auth/", {
        method: "POST",
        headers: {
          "Content-Type": "application/json;charset=utf-8",
        },
        body: JSON.stringify(formData),
      });

      const data = await res.json();

      return data.error || true;
    },
  },
};
