<template>
  <section class="pagination">
    <Button :text="'Prev'" />
    <a class="pagination__a">1</a>
    <a class="pagination__a">1</a>
    <a class="pagination__curr">1</a>
    <a class="pagination__a">1</a>
    <a class="pagination__a">1</a>
    <Button :text="'Next'" />
  </section>
</template>

<script>
import Button from "@/components/app/Button.vue";

export default {
  components: {
    Button,
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
  display: flex;
  align-items: center;
  padding: 0 0.5em;
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
