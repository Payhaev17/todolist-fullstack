<template>
  <div class="todo-item" :class="{ 'todo-item_completed': todo.complete }">
    <h3 class="todo-item__title" :class="{ 'line-through': todo.complete }">
      {{ todo.title }}
    </h3>
    <div class="todo-item__content">
      <span class="todo-item__text">
        {{ todo.text }}
      </span>
      <div class="todo-item__actions">
        <Button
          v-if="!todo.complete"
          class="button"
          :text="'Complete'"
          @buttonClickEmit="completeTodo"
        />
        <Button class="button" :text="'Delete'" @buttonClickEmit="deleteTodo" />
      </div>
    </div>
  </div>
</template>

<script>
import Button from "@/components/app/Button.vue";

export default {
  props: {
    todo: Object,
  },
  components: {
    Button,
  },
  methods: {
    async completeTodo() {
      const todo = await this.$store.dispatch("completeTodo", this.todo.id);

      this.$emit("changeTodoWithIdEmit", todo);
    },
    async deleteTodo() {
      const deletedTodo = await this.$store.dispatch(
        "deleteTodo",
        this.todo.id
      );
    },
  },
};
</script>

<style lang="scss" scoped>
.todo-item {
  padding: 0.5em;
  background-color: $white2;
  border-radius: 3px;
  cursor: pointer;
  margin-top: 1em;
  transition: 0.3s;

  &:nth-child(1) {
    margin-top: 0;
  }

  .todo-item__content {
    display: flex;
    justify-content: space-between;
    align-items: center;

    .todo-item__text {
      max-width: 50%;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }

    .button:nth-child(even) {
      margin-left: 1em;
    }
  }
}
.todo-item_completed {
  color: $white1;
  background-color: $green1;
}
.line-through {
  text-decoration: line-through;
}
</style>
