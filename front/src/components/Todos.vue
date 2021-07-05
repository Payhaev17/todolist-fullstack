<template>
  <section class="todos-section">
    <div class="todo-item">
      <h3 class="todo-title">Title</h3>
      <div class="todo-content">
        <span class="todo-text">Example todo</span>
        <div class="todo-actions">
          <Button class="button" :text="'Выполнено'" />
          <Button class="button" :text="'Удалить'" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Button from "@/components/app/Button.vue";

export default {
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
}
.todo-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.button:nth-child(even) {
  margin-left: 1em;
}
</style>
