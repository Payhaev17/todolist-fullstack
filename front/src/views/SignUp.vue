<template>
  <main class="sign-main">
    <Popup
      :active="popup.active"
      :title="popup.title"
      :text="popup.text"
      @closePopupEmit="closePopup"
    />
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
import Popup from "@/components/app/Popup.vue";

export default {
  components: {
    SignUpForm,
    Popup,
  },
  data: () => ({
    popup: {
      active: false,
      title: "Ошибка",
      text: "",
    },
  }),
  methods: {
    async signup(formData) {
      const res = await this.$store.dispatch("auth", {
        type: "signup",
        formData: {
          login: formData.login,
          password: formData.password,
        },
      });

      if (res.error) {
        this.popup.text = res.error;
        this.popup.active = true;
      } else {
        this.$router.push("/");
      }
    },
    closePopup() {
      this.popup.active = false;
    },
  },
};
</script>
