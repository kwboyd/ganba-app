<template lang="html">
  <div>
  <TopNav></TopNav>
  <!-- <textarea v-model="imeInput" @input="kana()"></textarea> -->
  <div class="container">
  <Intro></Intro>
  <VocabForm  @created="fetch"></VocabForm>
  <div>
    <Vocab v-for="(vocab, index) in vocabs" :key="index" :vocab="vocab" @updated="update" @deleted="remove(index)"></Vocab>
  </div>
</div>
</div>
</template>

<script>
import axios from 'axios';
import Intro from './Intro';
import Vocab from './Vocab';
import VocabForm from './VocabForm';
import TopNav from './TopNav';

export default {
  components: {
    Intro,
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

a, button {
  cursor: pointer;
}

h2, h3, p, label {
  font-family: $body-font;
}

h2, h3 {
  font-weight: 500;
}

h2 {
  margin-bottom: 15px;
}

h3 {
  margin-top: 45px;
  margin-bottom: 15px;
  font-size: 15pt;
}

p {
  font-size: 10.5pt;
  font-weight: 400;
}

.container {
  width: 90%;
  margin: 3vw auto;
}

.fa-plus-circle {
  color: $teal;
  background-color: white;
  height: 1em;
  font-size: 1.5em;
  border-radius: 50%;
  margin: auto 2px;
}


.primary-button {
  height: 35px;
  width: 100px;
  color: white;
  background-color: $teal;
  border-radius: 7px;
  border: 1px solid #747474;
  margin-top: 10px;
  -webkit-appearance: none;
  font-size: 7.5pt;
  text-transform: uppercase;
  &:hover {
    background-color: $dark-teal;
  }
  &:focus {
    outline: none;
  }
}

</style>
