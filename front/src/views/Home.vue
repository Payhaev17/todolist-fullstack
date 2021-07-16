<template>
  <div v-if="!loading">
    <MainHeader @exitEmit="exit" />
    <main class="home-main">
      <CreateTodoForm :active="createTodoFormActive" />
      <CreateTodoButton @createTodoEmit="createTodoOpen" />
      <article class="todos-article">
        <Search @searchEmit="changeSearchText" />
        <Todos
          class="todos"
          :todos="paginatedData"
          @changeTodoWithIdEmit="changeTodoWithId"
        />
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
          <span class="todos-info__value">{{ completedTasks }}</span>
        </div>
      </aside>
    </main>
  </div>
</template>

<script>
import MainHeader from "@/components/app/MainHeader.vue";

import Search from "@/components/Search.vue";
import Todos from "@/components/Todos.vue";
import Pagination from "@/components/Pagination.vue";
import CreateTodoButton from "@/components/CreateTodoButton.vue";
import CreateTodoForm from "@/components/CreateTodoForm.vue";

import PaginationMixin from "@/mixins/pagination.mixin.js";

export default {
  name: "home",
  components: {
    MainHeader,
    Search,
    Todos,
    Pagination,
    CreateTodoButton,
    CreateTodoForm,
  },
  mixins: [PaginationMixin],
  data: () => ({
    createTodoFormActive: false,
    loading: true,
    searchText: "",
    todos: [],
  }),
  created() {
    this.page = Number(this.$route.query.page) || 1;
  },
  async mounted() {
    this.todos = await this.$store.dispatch("fetchTodos");

    this.loading = false;
  },
  methods: {
    exit() {
      this.$store.dispatch("exit");
      this.$router.push("/signin");
    },
    changeSearchText(text) {
      this.searchText = text;
    },
    changeTodoWithId(todo) {
      this.todos = this.todos.map((todoElem) => {
        if (todoElem.id === todo.id) {
          return todo;
        } else {
          return todoElem;
        }
      });
    },
    createTodoOpen() {
      this.createTodoFormActive = !this.createTodoFormActive;
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
          if (typeof todo[key] === "string") {
            if (todo[key].includes(this.searchText)) return true;
          }
        }
      });
    },
    completedTasks() {
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
    width: 70%;
    padding: 1em;
    margin-right: 1em;
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
    width: 30%;
    height: 100%;
    padding: 1em;
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
</style>
