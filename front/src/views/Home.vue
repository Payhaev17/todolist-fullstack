<template>
  <div v-if="!loading">
    <MainHeader @logout="logout" @openCreateTodoForm="openCreateTodoForm" />
    <main class="home-main">
      <CreateTodoForm
        :active="createTodoForm.active"
        @openCreateTodoForm="openCreateTodoForm"
      />
      <aside class="todos-info">
        <h3 class="todos-info__title">Info</h3>
        <div class="todos-info__item">
          <div class="todos-info__name">
            <i class="tiny material-icons">format_list_bulleted</i>
            Total tasks:
          </div>
          <span class="todos-info__value">{{ todos.length }}</span>
        </div>
        <div class="todos-info__item">
          <div class="todos-info__name">
            <i class="material-icons">check</i>
            Completed tasks:
          </div>
          <span class="todos-info__value">{{ completedTodos }}</span>
        </div>
      </aside>
      <article class="todos-article">
        <Search @search="changeSearchText" />
        <Todos class="todos" :todos="paginatedData" />
        <Pagination
          class="pagination"
          :currPage="page"
          :maxPage="maxPage"
          :pages="paginationPages"
          @changePage="changePage"
        />
      </article>
    </main>
  </div>
</template>

<script>
import MainHeader from "@/components/app/MainHeader.vue";

import Search from "@/components/Search.vue";
import Todos from "@/components/Todos.vue";
import Pagination from "@/components/Pagination.vue";
import CreateTodoForm from "@/components/CreateTodoForm.vue";

import PaginationMixin from "@/mixins/pagination.mixin.js";

export default {
  name: "home",
  components: {
    MainHeader,
    Search,
    Todos,
    Pagination,
    CreateTodoForm,
  },
  mixins: [PaginationMixin],
  data: () => ({
    createTodoForm: {
      active: false,
    },
    loading: true,
    searchText: "",
  }),
  created() {
    this.page = Number(this.$route.query.page) || 1;
  },
  async mounted() {
    await this.$store.dispatch("fetchTodos");

    this.loading = false;
  },
  methods: {
    async logout() {
      await this.$store.dispatch("logout");
      this.$router.push("/signin");
    },
    changeSearchText(text) {
      this.searchText = text;
    },
    openCreateTodoForm() {
      this.createTodoForm.active = !this.createTodoForm.active;
    },
  },
  computed: {
    dataForPagination() {
      return this.searchFilter;
    },
    searchFilter() {
      return this.todos.filter((todo) => {
        const keys = Object.keys(todo);

        for (const key of keys) {
          const str = todo[key].toString();

          if (str.includes(this.searchText)) return true;
        }
      });
    },
    todos() {
      return this.$store.getters.getTodos;
    },
    completedTodos() {
      let completed = 0;

      for (const todo of this.todos) {
        if (todo.complete) ++completed;
      }

      return completed;
    },
  },
};
</script>

<style lang="scss" scoped>
.home-main {
  margin-top: 1em;
  display: flex;

  .todos-article {
    flex: 2;
    padding: 1em;
    box-shadow: 0px 2px 3px $grey1;
    border-radius: 3px;

    .todos {
      margin-top: 1em;
    }
    .pagination {
      margin-top: 1em;
    }
  }

  .todos-info {
    flex: 1;
    height: 100%;
    padding: 1em;
    margin-right: 1em;
    box-shadow: 0px 2px 3px $grey1;
    border-radius: 3px;

    .todos-info__title {
      text-align: center;
    }

    .todos-info__item {
      margin-top: 1em;
      display: flex;
      justify-content: space-between;
      align-items: center;

      .todos-info__name {
        width: 100%;
        display: flex;
        align-items: center;
      }
      .todos-info__value {
        width: 4em;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: right;
      }
    }
  }
}

@media screen and (max-width: 500px) {
  .home-main {
    flex-direction: column;

    .todos-info {
      margin-right: 0;
    }
  }
}
</style>
