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
      const res = await fetch("");
    },
  },
};
