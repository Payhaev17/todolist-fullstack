<template>
  <header class="main-header">
    <h3 class="main-header__logo">Todo app</h3>
    <div class="main-header__profile">
      <i class="tiny material-icons">account_circle</i>
      <span class="main-header__name">Mota</span>
      <div class="main-header__profile-down">
        <ul>
          <li @click="$emit('logout')">
            <i class="tiny material-icons">exit_to_app</i> <span>Exit</span>
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>

<style lang="scss" scoped>
.main-header {
  width: 100%;
  height: 3em;
  margin-top: 1em;
  color: $white1;
  background-color: $green1;
  box-shadow: 0px 2px 3px $grey1;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-radius: 3px;

  .main-header__logo {
    margin-left: 1em;
    cursor: pointer;
    position: relative;

    &:active {
      top: 1px;
    }
  }

  .main-header__profile {
    margin-right: 1em;
    padding: 0 1em;
    height: 100%;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: background-color 0.3s;
    position: relative;

    &:hover {
      background: $green3;
    }

    .main-header__profile-down {
      min-width: 120px;
      background: $white1;
      color: $black1;
      box-shadow: 0px 2px 4px $grey1;
      position: absolute;
      top: 100%;
      right: 0;
      transform: scale(0);
      transition: transform 0.3s;
    }

    &:hover .main-header__profile-down {
      transform: scale(1);
    }
  }

  .main-header__name {
    margin-left: 1em;
  }
}
</style>
