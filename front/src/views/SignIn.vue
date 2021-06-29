<template>
  <main class="signmain">
    <article class="signarticle">
      <section class="signsection">
        <h3 class="signarticle__title">SignIn</h3>
        <SignInForm />
      </section>
      <section class="redirectsection">
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
