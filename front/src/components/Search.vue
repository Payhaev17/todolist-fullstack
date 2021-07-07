<template>
  <section class="search-section">
    <input class="input input-simple" type="text" placeholder="Todo" />
    <Button class="button" :text="'Search'" />
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
.search-section {
  display: flex;
}
.button {
  margin-left: 1em;
}
</style>
