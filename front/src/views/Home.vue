<template>
  <div>
    <MainHeader />
    <main class="home-main">
      <article class="todos-article"></article>
      <aside class="todos-info-aside"></aside>
    </main>
  </div>
</template>

<script>
import MainHeader from "@/components/app/MainHeader.vue";

export default {
  name: "home",
  components: {
    MainHeader,
  },
  methods: {
    exit() {
      this.$store.dispatch("exit");
      this.$router.push("/signin");
    },
  },
};
</script>

<style>
.home-main {
  margin-top: 1em;
  display: flex;
}
.todos-article {
  width: 70%;
  height: 50vh;
  margin-right: 1em;
  box-shadow: 0px 2px 3px var(--grey1);
}
.todos-info-aside {
  width: 30%;
  height: 50vh;
  box-shadow: 0px 2px 3px var(--grey1);
}
</style>
