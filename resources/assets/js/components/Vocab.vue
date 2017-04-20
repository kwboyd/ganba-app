<template>
  <div class="Contact panel panel-default">
    <div class="panel-body">
      <div class="live">
        {{ vocab.word }} {{ vocab.meaning }}
        {{ vocab.meaning }} {{ vocab.sentence }}
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {

  props: [
    'vocab'
  ],

  data () {
    return {
      word: this.vocab.word,
      pronunciation: this.vocab.pronunciation,
      meaning: this.vocab.meaning,
      sentence: this.vocab.sentence
    }
  }
}
</script>

<style>
.tool > i {
  margin-left: 15px;
}
</style>
