<template>
  <form class="signform" @submit.prevent="$emit('signinEmit')">
    <input class="input" type="text" placeholder="Login" required />
    <input class="input" type="text" placeholder="Password" required />
    <div class="w100p text-right">
      <Button class="button" :disabled="false" :text="'Go'" />
    </div>
  </form>
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
.button {
  margin-top: 1em;
}
</style>
