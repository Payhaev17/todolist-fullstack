export default {
  state: {
    todos: [],
  },
  getters: {
    getTodos(state) {
      return state.todos;
    },
  },
  mutations: {
    setTodos(state, todos) {
      state.todos = todos;
    },
  },
  actions: {
    async fetchTodos(context) {
      const user = context.getters.getUser;

      const res = await fetch(
        process.env.VUE_APP_API_SERVER + "/api/UserTodos/",
        {
          method: "GET",
          headers: {
            Authorization: user.id + ":" + user.hash,
          },
        }
      );

      const todos = [
        { id: 1, title: "Title", text: "text task a", succ: 0 },
        { id: 2, title: "Title", text: "text task a", succ: 0 },
        { id: 3, title: "Title", text: "text task a", succ: 0 },
        { id: 4, title: "Title", text: "text task a", succ: 0 },
        { id: 5, title: "Title", text: "text task a", succ: 0 },
        { id: 6, title: "Title", text: "text task a", succ: 0 },
        { id: 7, title: "Title", text: "text task a", succ: 0 },
        { id: 8, title: "Title", text: "text task a", succ: 0 },
        { id: 9, title: "Title", text: "text task a", succ: 0 },
        { id: 10, title: "Title", text: "text task a", succ: 0 },
        { id: 11, title: "Title", text: "text task a", succ: 0 },
      ];

      if (typeof todos === "object") {
        context.commit("setTodos", todos);

        return todos;
      } else {
        return [];
      }
    },
  },
};
