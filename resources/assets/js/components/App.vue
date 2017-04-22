<template lang="html">
  <div>
  <TopNav></TopNav>
  <textarea v-model="imeInput" @input="kana()"></textarea>
  <VocabForm  @created="fetch"></VocabForm>
  <div>
    <Vocab v-for="(vocab, index) in vocabs" :key="index" :vocab="vocab" @updated="update" @deleted="remove(index)"></Vocab>
  </div>
</div>
</template>

<script>
import axios from 'axios';
import Vocab from './Vocab';
import VocabForm from './VocabForm';
import TopNav from './TopNav';

export default {
  components: {
    Vocab,
    VocabForm,
    TopNav
  },
  data () {
    return {
      vocabs: [],
      imeInput: '',
      kanaime: '',
      kanaconverted: ''
    }
  },
  mounted () {
    this.fetch();
  },

  methods: {
    kana () {
      // this.kanaconverted = this.imeInput.slice(0,-1);
      // // var currentKana = this.kanaconverted;
      // this.kanaime = wanakana.toKana(this.kanaconverted);
      // if (this.Imeinput.length > 2) {
      //   this.Imeinput = this.kanaime + this.Imeinput.slice(this.Imeinput.length - 1);
      // }
      // this.Imeinput = this.kanaime;
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
        var vocab = this.vocabs[i];
        if (d === 'vocab') continue;
        vocab[d] = data[d];
      }
    },

    remove (i) {
      console.log(`App -> remove ID: ${i}`);
      this.vocabs.splice(i, 1);
    }

  }
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

body {
  background-color: $beige;
}

* {
  margin: 0;
}

a {
  cursor: pointer;
}
</style>
