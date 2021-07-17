<template>
  <button class="button" @click="$emit('buttonClick')">{{ text }}</button>
</template>

<script>
export default {
  props: {
    text: String,
  },
};
</script>

<style lang="scss" scoped>
.button {
  display: inline-block;
  padding: 0.4em 0.8em;
  box-shadow: 0px 2px 5px $grey1;
  outline: none;
  border: none;
  border-radius: 4px;
  background-color: $white1;
  cursor: pointer;
  transition: 0.1s;

  &:active {
    box-shadow: 0px 0px 0px;
  }
}
</style>
