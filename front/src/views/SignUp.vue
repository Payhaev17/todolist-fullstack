<template>
  <main class="sign-main">
    <article class="sign-article">
      <section class="sign-section">
        <h3 class="sign-article__title">SignUp</h3>
        <SignUpForm @signupEmit="signup" />
      </section>
      <section class="redirect-section">
        <router-link to="/signin">SignIn</router-link>
      </section>
    </article>
  </main>
</template>

<script>
import SignUpForm from "@/components/SignUpForm.vue";

export default {
  components: {
    SignUpForm,
  },
  methods: {
    async signup(formData) {
      const res = await this.$store.dispatch("signup", {
        login: formData.login,
        password: formData.password,
      });

      console.log(res);
    },
  },
};
</script>
