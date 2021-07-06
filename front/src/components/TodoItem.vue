<template>
  <div class="todo-item">
    <h3 class="todo-title">{{ todo.title }}</h3>
    <div class="todo-content">
      <span class="todo-text">
        {{ todo.text }}
      </span>
      <div class="todo-actions">
        <Button class="button" :text="'Выполнено'" />
        <Button class="button" :text="'Удалить'" />
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
</style>
