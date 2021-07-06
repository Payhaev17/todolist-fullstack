<template>
  <div>
    <MainHeader @exitEmit="exit" />
    <main class="home-main">
      <article class="todos-article">
        <Search />
        <Todos :todos="todos" class="todos" />
      </article>
      <aside class="todos-info-aside"></aside>
    </main>
  </div>
</template>

<script>
import MainHeader from "@/components/app/MainHeader.vue";

import Search from "@/components/Search.vue";
import Todos from "@/components/Todos.vue";

export default {
  name: "home",
  components: {
    MainHeader,
    Search,
    Todos,
  },
  data: () => ({
    todos: [
      { id: 1, title: "Title", text: "Helo wrodld awda dla aa" },
      { id: 2, title: "Title", text: "Helo wrodld awda dla aa" },
      { id: 3, title: "Title", text: "Helo wrodld awda dla aa" },
      { id: 4, title: "Title", text: "Helo wrodld awda dla aa" },
      { id: 5, title: "Title", text: "Helo wrodld awda dla aa" },
    ],
  }),
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
.todos-info-aside {
  width: 30%;
  height: 25vh;
  box-shadow: 0px 2px 3px var(--grey1);
  border-radius: 3px;
}
.todos {
  margin-top: 1em;
}
</style>
