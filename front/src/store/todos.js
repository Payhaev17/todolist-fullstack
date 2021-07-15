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
    changeTodoWithId(state, todo) {
      state.todos = state.todos.map((todoElem) => {
        if (todoElem.id === todo.id) {
          return todo;
        } else {
          return todoElem;
        }
      });
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

      // const todos = [
      //   { id: 1, title: "Title", text: "text task a", succ: 0 },
      //   { id: 2, title: "Title", text: "text task a", succ: 0 },
      //   { id: 3, title: "Title", text: "text task a", succ: 0 },
      //   { id: 4, title: "Title", text: "text task a", succ: 0 },
      //   { id: 5, title: "Title", text: "text task a", succ: 0 },
      //   { id: 6, title: "Title", text: "text task a", succ: 0 },
      //   { id: 7, title: "Title", text: "text task a", succ: 0 },
      //   { id: 8, title: "Title", text: "text task a", succ: 0 },
      //   { id: 9, title: "Title", text: "text task a", succ: 0 },
      //   { id: 10, title: "Title", text: "text task a", succ: 0 },
      //   { id: 11, title: "Title", text: "text task a", succ: 0 },
      // ];

      const todos = await res.json();

      if (todos instanceof Array) {
        context.commit("setTodos", todos);

        return todos;
      } else {
        return [];
      }
    },
    async completeTodo(context, id) {
      const user = context.getters.getUser;

      const res = await fetch(
        process.env.VUE_APP_API_SERVER + "/api/UserTodos/?id=" + id,
        {
          method: "PATCH",
          headers: {
            Authorization: user.id + ":" + user.hash,
          },
          body: JSON.stringify({
            key: "complete",
            to: 1,
          }),
        }
      );

      const todo = await res.json();

      context.commit("changeTodoWithId", todo);

      return todo;
    },
    async deleteTodo(id) {
      const user = context.getters.getUser;

      const res = await fetch(
        process.env.VUE_APP_API_SERVER + "/api/UserTodos/?id=" + id,
        {
          method: "DELETE",
          headers: {
            Authorization: user.id + ":" + user.hash,
          },
        }
      );

      const deletedTodo = await res.json();

      context.commit("deleteTodo", deletedTodo);

      return deletedTodo;
    },
  },
};
