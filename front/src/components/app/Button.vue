<template>
  <button class="button" @click="$emit('buttonClickEmit')">{{ text }}</button>
</template>

<script>
export default {
  props: {
    text: String,
  },
};
</script>

<style>
.button {
  display: inline-block;
  padding: 5px 10px;
  box-shadow: 0px 2px 5px var(--grey1);
  outline: none;
  border: none;
  border-radius: 5px;
  background: none;
  cursor: pointer;
  transition: 0.1s;
}
.button:active {
  box-shadow: 0px 0px 0px;
}
</style>
