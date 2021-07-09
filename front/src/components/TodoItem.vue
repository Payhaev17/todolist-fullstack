<template>
  <div class="todo-item" :class="{ 'todo-item_completed': todo.complete }">
    <h3 class="todo-title" :class="{ 'line-through': todo.complete }">
      {{ todo.title }}
    </h3>
    <div class="todo-content">
      <span class="todo-text">
        {{ todo.text }}
      </span>
      <div class="todo-actions">
        <Button
          class="button"
          :text="'Complete'"
          @buttonClickEmit="$emit('completeTodoEmit')"
        />
        <Button
          class="button"
          :text="'Delete'"
          @buttonClickEmit="$emit('deleteTodoEmit')"
        />
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
};
</script>

<style scoped>
.todo-item {
  padding: 0.5em;
  background-color: var(--white2);
  border-radius: 3px;
  cursor: pointer;
  margin-top: 1em;
}
.todo-item_completed {
  background-color: var(--green2);
}
.todo-item:nth-child(1) {
  margin-top: 0;
}
.todo-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.todo-text {
  max-width: 50%;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
.button:nth-child(even) {
  margin-left: 1em;
}
.line-through {
  text-decoration: line-through;
}
</style>
