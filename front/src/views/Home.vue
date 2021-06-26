<template>
  <div>Home</div>
</template>

<script>
export default {
  name: "home",
  mounted() {
    fetch("http://back:85/");
  },
};
</script>
