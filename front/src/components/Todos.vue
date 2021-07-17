<template>
  <section class="todos-section">
    <div v-if="todos.length" class="todos-list">
      <TodoItem v-for="todo in todos" :key="todo.id" :todo="todo" />
    </div>
    <h4 class="todos-empty" v-else>Пусто</h4>
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

<style lang="scss" scoped>
.todos-section {
  height: 380px;

  .todos-empty {
    text-align: center;
  }
}
</style>
