<template>
  <div>
    <MainHeader @exitEmit="exit" />
    <main class="home-main">
      <article class="todos-article">
        <Search />
        <Todos class="todos" :todos="paginatedData" />
        <Pagination
          class="pagination"
          :currPage="page"
          :maxPage="maxPage"
          :pages="paginationPages"
          @changePageEmit="changePage"
        />
      </article>
      <aside class="todos-info">
        <h3 class="todos-info__title">Info</h3>
      </aside>
    </main>
  </div>
</template>

<script>
import MainHeader from "@/components/app/MainHeader.vue";

import Search from "@/components/Search.vue";
import Todos from "@/components/Todos.vue";
import Pagination from "@/components/Pagination.vue";

import PaginationMixin from "@/mixins/pagination.mixin.js";

export default {
  name: "home",
  components: {
    MainHeader,
    Search,
    Todos,
    Pagination,
  },
  mixins: [PaginationMixin],
  data: () => ({
    dataForPagination: [],
  }),
  created() {
    this.page = Number(this.$route.query.page) || 1;
  },
  async mounted() {
    this.dataForPagination = await this.$store.dispatch("fetchTodos");
  },
  methods: {
    exit() {
      this.$store.dispatch("exit");
      this.$router.push("/signin");
    },
  },
};
</script>

<style scoped>
.home-main {
  margin-top: 1em;
  display: flex;
}
.todos-article {
  width: 70%;
  padding: 1em;
  margin-right: 1em;
  box-shadow: 0px 2px 3px var(--grey1);
  border-radius: 3px;
}
.todos-info {
  width: 30%;
  padding: 1em;
  max-height: 200px;
  box-shadow: 0px 2px 3px var(--grey1);
  border-radius: 3px;
}
.todos-info__title {
  text-align: center;
}
.todos {
  margin-top: 1em;
}
.pagination {
  margin-top: 1em;
}
</style>
