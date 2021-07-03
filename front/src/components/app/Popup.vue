<template>
  <div class="popup" :class="{ 'popup-close': !active }">
    <div class="popup__content">
      <h3 class="popup__title">
        {{ title }}
      </h3>
      <span class="popup__text">
        {{ text }}
      </span>
      <Button
        class="popup__button"
        :text="'Закрыть'"
        @buttonClickEmit="$emit('closePopupEmit')"
      />
    </div>
  </div>
</template>

<script>
import Button from "@/components/app/Button.vue";

export default {
  props: {
    active: Boolean,
    title: String,
    text: String,
  },
  components: {
    Button,
  },
};
</script>

<style>
.popup {
  width: 100%;
  height: 100vh;
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: scale(1, 1);
  transition: transform linear 0.3s;
}
.popup-close {
  transform: scale(0);
}
.popup__content {
  position: relative;
  border-radius: 5px;
  padding: 5em;
  background-color: white;
  box-shadow: 0px 3px 6px grey;
  text-align: center;
}
.popup__text {
  display: inline-block;
  margin-top: 1em;
}
.popup__button {
  position: absolute;
  bottom: 0;
  right: 0;
  margin: 1em;
}
</style>
