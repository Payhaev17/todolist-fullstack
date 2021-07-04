<template>
  <form class="sign-form" @submit.prevent="signup">
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
    <input
      class="input"
      :class="{ 'input-invalid': !validPassword2 }"
      type="password"
      placeholder="Repeat the password"
      v-model="form.password2"
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
      password2: "",
    },
  }),
  methods: {
    signup() {
      if (this.allValid) {
        this.form.login = "";
        this.form.password = "";
        this.form.password2 = "";

        this.$emit("signupEmit", this.form);
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
    validPassword2() {
      return this.form.password === this.form.password2;
    },
    allValid() {
      return this.validLogin && this.validPassword && this.validPassword2;
    },
  },
};
</script>

<style scoped>
.button {
  margin-top: 1em;
}
</style>
