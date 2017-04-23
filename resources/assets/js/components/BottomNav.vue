<template lang="html">
  <div class="footer">
    <div class="footer-wrapper">
      <p>Current quiz: <span class="bold">{{quizVocabs.length}}</span> words</p>
      <a href="#"><p id="start-button">START QUIZ <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p></a>
    </div>
  </div>
</template>

<script>
export default {
  props: [
    'quizVocabs'
  ]
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
  p {
    color: white;
    font-weight: 400;
    font-size: 1.3em;
    display: inline-block;
  }
}

#start-button {
  margin-right: 20px;
  float: right;
  font-weight: 700;
  font-size: 1.6em;
  margin-top: -.27em;
  display: flex;
  align-items: center;
  i {
    font-size: 1.5em;
    margin-left: 8px;
  }
  &:hover {
    color: #dddddd;
  }
}

.bold {
  font-weight: 700;
}

@media screen and (max-width: 445px) {
  .footer-wrapper {
    padding-top: 15px;
    p {
      font-size: 1.1em;
    }
  }
  #start-button {
    font-size: 1.4em;
  }
}

</style>
