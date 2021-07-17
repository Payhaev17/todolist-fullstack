<template>
  <form
    class="create-todo"
    :class="{ 'create-todo_active': active }"
    @click="createTodoFormState"
    @submit.prevent="submit"
  >
    <div
      class="create-todo-inner"
      :class="{ 'create-todo-inner_active': active }"
    >
      <h3 class="create-todo__title">Create todo</h3>
      <input
        class="input"
        :class="{ input_invalid: !titleValid }"
        type="text"
        placeholder="Title"
        v-model="form.title"
      />
      <input
        class="input"
        :class="{ input_invalid: !textValid }"
        type="text"
        placeholder="Text"
        v-model="form.text"
      />
      <Button class="button" :disabled="!allValid" :text="'Create'" />
    </div>
  </form>
</template>

<script>
import Button from "@/components/app/Button.vue";

import ValidatorMixin from "@/mixins/validator.mixin.js";

export default {
  props: {
    active: Boolean,
  },
  components: {
    Button,
  },
  mixins: [ValidatorMixin],
  data: () => ({
    form: {
      title: "",
      text: "",
    },
  }),
  methods: {
    createTodoFormState(e) {
      // Count a click only on the black zone
      if (e.target.classList.contains("create-todo"))
        this.$emit("createTodoFormState");
    },
    submit() {
      this.$emit("createTodo", { ...this.form });

      this.form.title = "";
      this.form.text = "";
    },
  },
  computed: {
    titleValid() {
      return this.todoTitleValid(this.form.title);
    },
    textValid() {
      return this.todoTextValid(this.form.text);
    },
    allValid() {
      return this.titleValid && this.textValid;
    },
  },
};
</script>

<style lang="scss" scoped>
.create-todo {
  width: 100vw;
  height: 100vh;
  position: absolute;
  top: 0;
  left: 0;
  background-color: $grey1;
  display: flex;
  justify-content: center;
  align-items: center;
  visibility: hidden;

  .create-todo-inner {
    min-width: 25vw;
    padding: 2em;
    background-color: $white1;
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    flex-direction: column;
    transition: transform 0.3s;
    transform: scale(0);

    .create-todo__title {
      width: 100%;
      text-align: left;
    }

    .button {
      margin-top: 1em;
    }
  }

  .create-todo-inner_active {
    transform: scale(1);
  }
}

.create-todo_active {
  visibility: visible;
  transform: scale(1);
}
</style>
