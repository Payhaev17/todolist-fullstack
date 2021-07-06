<template>
  <section class="todos-section">
    <TodoItem v-for="todo in todos" :key="todo.id" :todo="todo" />
  </section>
</template>

<script>
import TodoItem from "@/components/TodoItem.vue";

export default {
  props: {
    todos: Array,
  },
  components: {
    TodoItem,
  },
};
</script>
