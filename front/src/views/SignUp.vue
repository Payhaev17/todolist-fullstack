<template>
  <main class="signmain">
    <article class="signarticle">
      <section class="signsection">
        <h3 class="signarticle__title">SignUp</h3>
        <SignUpForm @signupEmit="signup" />
      </section>
      <section class="redirectsection">
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
    signup(formData) {
      console.log("Signup", formData);
      this.$store.dispatch("signup", formData);
    },
  },
};
</script>
