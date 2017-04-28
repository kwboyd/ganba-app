<template lang="html">
  <div class="intro-text">
    <h3>Let's begin! 始めましょう！</h3>
    <p>This is an app made to help intermediate to advanced Japanese language learners memorize vocabulary through quizzes on pronunciations and meanings.
      It has an optional pronunciation field to account for words with kanji, making it optimized for Japanese specifically. This app also offers a faster quizzing experience by converting pronunciation from romaji without the need to switch to an IME. To get started:</p>
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

/* Instructions styles */

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
