<template>
  <section class="pagination">
    <router-link
      :to="'/?page=' + prevPage"
      @click="$emit('changePageEmit', prevPage)"
    >
      Prev
    </router-link>
    <router-link
      v-for="page in pages"
      :key="page"
      :class="{ pagination__curr: currPage === page }"
      :to="'/?page=' + page"
      @click="$emit('changePageEmit', page)"
    >
      {{ page }}
    </router-link>
    <router-link
      :to="'/?page=' + nextPage"
      @click="$emit('changePageEmit', nextPage)"
    >
      Next
    </router-link>
  </section>
</template>

<script>
import Button from "@/components/app/Button.vue";

export default {
  props: {
    currPage: Number,
    maxPage: Number,
    pages: Array,
  },
  components: {
    Button,
  },
  computed: {
    prevPage() {
      return this.currPage <= 1 ? 1 : this.currPage - 1;
    },
    nextPage() {
      return this.currPage >= this.maxPage ? this.currPage : this.currPage + 1;
    },
  },
};
</script>

<style scoped>
.pagination {
  width: 100%;
  display: flex;
  justify-content: space-between;
}
.pagination a {
  padding: 0.3em 0.5em;
  text-decoration: none;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 3px;
  box-shadow: 0px 2px 5px var(--grey1);
  cursor: pointer;
  transition: 0.1s;
}
.pagination a:active {
  box-shadow: none;
}
.pagination__curr {
  padding: 0 1em;
  color: var(--white1);
  background-color: var(--green1);
  font-weight: 900;
}
</style>
