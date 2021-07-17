<template>
  <button class="create-todo" @click="$emit('createTodoFormState')">
    <i class="material-icons">add</i>
  </button>
</template>

<style lang="scss" scoped>
.create-todo {
  padding: 1em;
  margin: 2em;
  position: fixed;
  bottom: 0;
  right: 0;
  border-radius: 100%;
  border: none;
  outline: none;
  color: $white1;
  background-color: $green1;
  box-shadow: 0px 2px 4px $grey1;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.3s;
  cursor: pointer;

  &:hover {
    color: $green1;
    background-color: $white1;
  }
}
</style>
