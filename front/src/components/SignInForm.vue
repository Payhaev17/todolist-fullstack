<template>
  <form class="sign-form" @submit.prevent="signin">
    <input
      class="input"
      :class="{ 'input-invalid': !validLogin }"
      type="text"
      placeholder="Login"
      v-model.trim="form.login"
    />
    <input
      class="input"
      :class="{ 'input-invalid': !validPassword }"
      type="password"
      placeholder="Password"
      v-model.trim="form.password"
    />
    <div class="w100p text-right">
      <Button class="button" :disabled="!allValid" :text="'Go'" />
    </div>
  </form>
</template>

<script>
import Button from "@/components/app/Button.vue";

import ValidatorMixin from "@/mixins/validator.mixin.js";

export default {
  components: {
    Button,
  },
  mixins: [ValidatorMixin],
  data: () => ({
    form: {
      login: "",
      password: "",
    },
  }),
  methods: {
    signin() {
      if (this.allValid) {
        this.form.login = "";
        this.form.password = "";

        this.$emit("signinEmit", this.form);
      }
    },
  },
  computed: {
    validLogin() {
      return this.loginValid(this.form.login);
    },
    validPassword() {
      return this.passwordValid(this.form.password);
    },
    allValid() {
      return this.validLogin && this.validPassword;
    },
  },
};
</script>

<style scoped>
.button {
  margin-top: 1em;
}
</style>
