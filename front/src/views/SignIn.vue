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
        <h3 class="sign-article__title">SignIn</h3>
        <SignInForm @signinEmit="signin" />
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
    async signin() {
      const res = await this.$store.dispatch("auth", "signin", {
        login: formData.login,
        password: formData.password,
      });

      if (res.error) {
        this.popup.text = res.error;
        this.popup.active = true;
      } else {
        // this.$router.push("/");
      }
    },
    closePopup() {
      this.popup.active = false;
    },
  },
};
</script>
