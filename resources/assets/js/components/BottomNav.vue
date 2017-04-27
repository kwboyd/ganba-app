<template lang="html">
  <div class="footer">
    <div class="footer-wrapper">
      <p>Current quiz: <span class="bold">{{quizVocabs.length}}</span> words</p>
      <button :disabled="quizVocabs.length < 1" @click="startQuiz" :class="{inactive: !quizReady}">START QUIZ <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'quizVocabs',
    'quizReady'
  ],
  methods: {
    startQuiz () {
      // emits event to enter quiz mode
      this.$emit('beginQuiz');
    }
  }
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

.footer {
  width: 100%;
  border-radius: 10px 0px 0px 0px;
  max-width: 500px;
  right: 0;
  height: 46px;
  position: fixed;
  bottom: 0;
  background-color: $teal;

  box-shadow: 0px 2px 15px #bbbbbb;
  padding: 5px;
}

.footer-wrapper {
  padding-top: 13px;
  padding-bottom: 6px;
  padding-left: 20px;
  p, button {
    color: white;
    font-weight: 400;
    font-size: 1.3em;
    font-family: $header-font;
    display: inline-block;
  }
  button {
    border: none;
    background: none;
    margin-right: 20px;
    float: right;
    font-weight: 700;
    font-size: 1.6em;
    margin-top: -.38em;
    display: flex;
    align-items: center;
    i {
      font-size: 1.5em;
      margin-left: 8px;
    }
    &:hover {
      color: #dedede;
    }
  }

  .inactive {
    cursor: default;
    color: #c0d8d1;
    &:hover {
      color: #c0d8d1;
    }
  }
}

.bold {
  font-weight: 700;
}

@media screen and (max-width: 445px) {
  .footer-wrapper {
    padding-top: 15px;
    p {
      font-size: 1em;
    }
  }
  #start-button {
    font-size: 1.3em;
    margin-top: -9px;
    margin-right: 8px;
  }
}

@media screen and (max-width: 370px) {
  .footer-wrapper {
    p {
      font-size: .9em;
    }
  }
  #start-button {
    font-size: 1.1em;
    margin-top: -7px;
    margin-right: 5px;
  }
  .footer {
    height: 40px;
  }
  .footer-wrapper {
    padding-top: 12px;
  }
}

</style>
