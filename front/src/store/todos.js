export default {
  state: {
    todos: [],
  },
  getters: {
    getTodos(state) {
      return state.todos;
    },
  },
  mutations: {},
  actions: {
    async fetchTodos(context) {
      const res = await fetch(process.env.VUE_APP_API_SERVER + "/UserTodos/", {
        method: "GET",
        headers: {
          Authorization: 1 + ":" + 1,
        },
      });
    },
  },
};
