<template>
  <main>
    <header class="main-header">
      <h3 class="main-header__logo">Todo app</h3>
      <div class="main-header__profile">
        <i class="tiny material-icons">account_circle</i>
        <span class="main-header__name">Mota</span>
        <div class="main-header__profile-down">
          <ul>
            <li @click="exit">
              <i class="tiny material-icons">exit_to_app</i> <span>Exit</span>
            </li>
          </ul>
        </div>
      </div>
    </header>
  </main>
</template>

<script>
export default {
  name: "home",
  methods: {
    exit() {
      this.$store.dispatch("exit");
      this.$router.push("/signin");
    },
  },
};
</script>

<style>
.main-header {
  width: 100%;
  height: 3em;
  color: white;
  background-color: var(--green1);
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.main-header__logo {
  margin-left: 1em;
  cursor: pointer;
  position: relative;
}
.main-header__logo:active {
  top: 1px;
}
.main-header__profile {
  margin-right: 1em;
  height: 100%;
  display: flex;
  align-items: center;
  cursor: pointer;
  transition: opacity 0.3s;
  position: relative;
}
.main-header__profile-down {
  min-width: 120px;
  background: white;
  color: #212121;
  box-shadow: 0px 2px 4px grey;
  position: absolute;
  top: 100%;
  right: 0;
  transform: scale(0);
  transition: transform 0.3s;
}
.main-header__profile:hover .main-header__profile-down {
  transform: scale(1);
}
.main-header__name {
  margin-left: 1em;
}
</style>
