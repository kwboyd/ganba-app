<template>
  <div class="VocabForm">
    <input type="text" v-model="word" />
    <input type="text" v-model="pronunciation" />
    <input type="text" v-model="meaning" />
    <textarea v-model="sentence"></textarea>
    <button class="btn btn-primary" @click="create">Add word</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {

  data() {
    return {
      word: '',
      pronunciation: '',
      meaning: '',
      sentence: ''
    }
  },

  methods: {
    create () {
      console.log('VocabForm -> create');
      this.sendRequest();
    },

    sendRequest () {
      axios.post('/vocabs', {
        word: this.word,
        pronunciation: this.pronunciation,
        meaning: this.meaning,
        sentence: this.sentence
      })
      .then((response) => {
        console.log('VocabForm -> sendRequest success');
        console.log(response.data);
        this.reset();
        this.$emit('created');
      })
      .catch((error) => {
        console.error('VocabForm -> sendRequest error');
        // show an error message
      });
    },

    reset () {
      this.word = '';
      this.pronunciation = '';
      this.meaning = '';
      this.sentence = '';
    }
  }
};
</script>

<style scoped>
</style>
