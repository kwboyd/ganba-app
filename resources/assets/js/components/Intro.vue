<template lang="html">
  <div class="intro-text">
    <h3>Let's begin! 始めましょう！</h3>
    <div class="instructions">
      <p>1. Add some words to your deck to study.</p>
      <p>2. Add cards you want to be quizzed on to your quiz set using the <i class="fa fa-plus-circle" aria-hidden="true"></i>
  icon.</p>
      <p>3. Click the ‘start quiz’ button in the footer.</p>
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
    margin-bottom: 25px;
    text-align: left;
  }
}

.instructions {
  margin-top: 15px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  p {
    width: 22%;
  }
}

@media screen and (max-width: 650px) {
  .instructions {
    p {
      width: 100%;
      margin-bottom: 10px;
    }
  }
}
@media screen and (max-width: 370px) {
  .intro-text {
    h3 {
      font-size: 2em;
    }
  }
}
</style>
