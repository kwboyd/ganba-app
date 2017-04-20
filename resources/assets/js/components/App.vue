<template lang="html">
  <div>
  <h1> meow
  {{cat}}</h1>
  <textarea v-model="imeinput" @input="kana()"></textarea>
  <VocabForm  @created="fetch"></VocabForm>
  <div class="VocabList">
    <Vocab v-for="(vocab, index) in vocabs" :key="index" :vocab="vocab" @updated="update" @deleted="remove(index)"></Vocab>
  </div>
</div>
</template>

<script>
import axios from 'axios';
import Vocab from './Vocab';
import VocabForm from './VocabForm';

export default {
  components: {
    Vocab,
    VocabForm
  },
  data () {
    return {
      vocabs: [],
      cat: 'preload',
      imeinput: '',
      kanaime: ''
    }
  },
  mounted () {
    this.fetch();
  },

  methods: {
    kana() {
      console.log('woof')
      this.kanaime = wanakana.toKana(this.imeinput);
      this.imeinput = this.kanaime;
    },
    fetch () {
      console.log('App -> fetch');
      axios.get('/vocabs')
        .then((response) => {
          console.log('App -> fetch success');
          console.log(response.data);
          this.vocabs = response.data;
        })
        .catch((response) => {
          console.log('App -> fetch error');
          // show error
        })
    },

    update (data) {
      // this.fetch();
      var i = this.vocabs.indexOf(data.vocab);
      for (var d in data) {
        this.vocabs[i][d] = data[d];
      }
    },

    remove (i) {
      console.log(`App -> remove ID: ${i}`);
      this.vocabs.splice(i, 1);
    }

  }
}
</script>

<style lang="css">
</style>
