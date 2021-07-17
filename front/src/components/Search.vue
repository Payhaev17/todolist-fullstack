<template>
  <section class="search-section">
    <input
      class="input input_simple"
      type="text"
      placeholder="Todo"
      v-model="searchText"
    />
    <Button
      class="button"
      :text="'Search'"
      @click="$emit('search', searchText)"
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
      this.$emit("search", this.searchText);
    },
  },
};
</script>

<style lang="scss" scoped>
.search-section {
  display: flex;

  .button {
    margin-left: 1em;
  }
}
</style>
