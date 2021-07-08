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
        { id: 1, title: "Title", text: "text task a", complete: 0 },
        { id: 2, title: "lita", text: "text task a", complete: 1 },
        { id: 3, title: "Name", text: "text task a", complete: 1 },
        { id: 4, title: "Mota", text: "text task a", complete: 0 },
        { id: 5, title: "Gag", text: "text task a", complete: 1 },
        { id: 6, title: "XXX", text: "text task a", complete: 1 },
        { id: 7, title: "Face", text: "text task a", complete: 1 },
        { id: 8, title: "Она была в нем", text: "text task a", complete: 0 },
        { id: 9, title: "jf", text: "text task a", complete: 0 },
        { id: 10, title: "Face", text: "text task a", complete: 0 },
        { id: 11, title: "WWE", text: "text task a", complete: 0 },
      ];

      if (todos instanceof Array) {
        context.commit("setTodos", todos);

        return todos;
      } else {
        return [];
      }
    },
  },
};
