<template>
  <section class="search-section">
    <input
      class="input input-simple"
      type="text"
      placeholder="Todo"
      v-model="searchText"
    />
    <Button
      class="button"
      :text="'Search'"
      @click="$emit('searchEmit', searchText)"
    />
  </section>
</template>

<script>
import Button from "@/components/app/Button.vue";

export default {
  components: {
    Button,
  },
  data: () => ({
    searchText: "",
  }),
  watch: {
    searchText() {
      this.$emit("searchEmit", this.searchText);
    },
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
