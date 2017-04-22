<template lang="html">
  <div>
    <h2>Let's begin! 始めましょう！</h2>
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
</style>
