<template lang="html">
  <div class="intro-text">
    <h3>Let's begin! 始めましょう！</h3>
    <p>This is an app made to help intermediate to advanced Japanese language learners keep track of
       and memorize vocabulary through quizzes on pronunciations and meanings. To get started:</p>
    <div class="instructions">
      <ol>
      <li>Add some words to your deck to study.</li>
      <li>Add cards you want to be quizzed on to your quiz set using the <i class="fa fa-plus-circle" aria-hidden="true"></i>
  icon.</li>
      <li>Click the ‘start quiz’ button in the footer.</li>
    </ol>
    </div>
</div>
</template>

<script>
export default {
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

.intro-text {
  h3 {
    margin-bottom: 15px;
    text-align: left;
  }
  p {
    line-height: 1.4;
    padding-right: 25px;
  }
}

.instructions {
  margin-top: 15px;
}

@media screen and (max-width: 370px) {
  .intro-text {
    h3 {
      font-size: 2em;
    }
  }
}
</style>
