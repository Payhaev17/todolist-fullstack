<template>
  <main class="sign-main">
    <article class="sign-article">
      <section class="sign-section">
        <h3 class="sign-article__title">SignIn</h3>
        <SignInForm />
      </section>
      <section class="redirect-section">
        <router-link to="/signup">SignUp</router-link>
      </section>
    </article>
  </main>
</template>

<script>
import SignInForm from "@/components/SignInForm.vue";

export default {
  components: {
    SignInForm,
  },
};
</script>
