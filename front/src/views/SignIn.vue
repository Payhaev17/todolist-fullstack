<template>
  <main class="sign-main">
    <Popup
      :active="popup.active"
      :title="popup.title"
      :text="popup.text"
      @closePopup="closePopup"
    />
    <article class="sign-article">
      <section class="sign-section">
        <h3 class="sign-article__title">SignIn</h3>
        <SignInForm @signin="signin" />
      </section>
      <section class="redirect-section">
        <router-link to="/signup">SignUp</router-link>
      </section>
    </article>
  </main>
</template>

<script>
import SignInForm from "@/components/SignInForm.vue";
import Popup from "@/components/app/Popup.vue";

export default {
  components: {
    SignInForm,
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
    async signin(formData) {
      const res = await this.$store.dispatch("auth", {
        type: "signin",
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
