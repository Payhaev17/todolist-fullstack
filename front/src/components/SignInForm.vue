<template>
  <form class="sign-form" @submit.prevent="signin">
    <input
      class="input"
      :class="{ input_invalid: !validLogin }"
      type="text"
      placeholder="Login"
      v-model.trim="form.login"
    />
    <input
      class="input"
      :class="{ input_invalid: !validPassword }"
      type="password"
      placeholder="Password"
      v-model.trim="form.password"
    />
    <div class="button-right">
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
        this.$emit("signin", { ...this.form });

        this.form.login = "";
        this.form.password = "";
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

<style lang="scss" scoped>
.button-right {
  width: 100%;
  text-align: right;

  .button {
    margin-top: 1em;
  }
}
</style>
