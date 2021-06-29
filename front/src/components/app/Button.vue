<template>
  <button @click="$emit('buttonClickEmit')">{{ text }}</button>
</template>

<script>
export default {
  props: {
    text: String,
  },
};
</script>

<style scoped>
button {
  display: inline-block;
  padding: 5px 10px;
  box-shadow: 0px 2px 5px grey;
  outline: none;
  border: none;
  border-radius: 5px;
  background: none;
  cursor: pointer;
  transition: 0.1s linear;
}
button:active {
  box-shadow: 0px 0px 0px;
}
button:disabled {
  opacity: 0.5;
}
</style>
