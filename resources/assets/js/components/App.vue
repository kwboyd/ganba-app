<template lang="html">
<div>
  <TopNav></TopNav>
  <!-- <textarea v-model="imeInput" @input="kana()"></textarea> -->
  <div class="container">
    <Intro></Intro>
    <VocabForm  @created="fetch"></VocabForm>
      <h3>Your Deck:</h3>
    <div class="deck">
        <Vocab v-for="(vocab, index) in reverseVocabs" :key="index" :vocab="vocab" @updated="update" @deleted="remove(index)"></Vocab>
        <Filler v-if="this.vocabs.length % 3 >= 1"></Filler>
        <Filler v-if="this.vocabs.length % 3 == 1"></Filler>
    </div>
  </div>
  <BottomNav :quizVocabs="quizVocabs"></BottomNav>
</div>
</template>

<script>
import axios from 'axios';
import Intro from './Intro';
import Vocab from './Vocab';
import VocabForm from './VocabForm';
import TopNav from './TopNav';
import Filler from './Filler';
import BottomNav from './BottomNav';

export default {
  components: {
    Intro,
    Vocab,
    VocabForm,
    TopNav,
    Filler,
    BottomNav
  },
  data () {
    return {
      vocabs: [],
      imeInput: '',
      kanaime: '',
      kanaconverted: '',
      quizVocabs: []
    }
  },
  mounted () {
    this.fetch();
  },

  computed: {
    reverseVocabs: function() {
      return this.vocabs.reverse();
    }
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

h1, h2, h3, p, label, a {
  color: $dark-gray;
}

h2, h3, p, label {
  font-family: $body-font;
}

h2, h3 {
  font-weight: 500;
}

h2 {
  margin-bottom: 15px;
  font-size: 1.8em;
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

textarea {
  resize: none;
}

.container {
  width: 90%;
  margin: 40px auto;
}

.fa-plus-circle {
  color: $teal;
  background-color: white;
  height: 1em;
  font-size: 1.5em;
  border-radius: 50%;
  margin: auto 2px;
}

.primary-button, .danger-button {
  height: 35px;
  width: 100px;
  color: white;
  border-radius: 7px;
  border: 1px solid #747474;
  margin-top: 10px;
  -webkit-appearance: none;
  font-size: 7.5pt;
  text-transform: uppercase;
  &:focus {
    outline: none;
  }
}

.primary-button {
  background-color: $teal;
  &:hover {
    background-color: $dark-teal;
  }
}

.danger-button {
  background-color: $red;
  &:hover {
    background-color: $dark-red;
  }
}

.button-small {
  height: 22px;
  width: 70px;
  border-radius: 5px;
}

.deck {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
}

@media screen and (max-width: 1140px) {
  .deck {
    justify-content: center;
    margin-right: auto;
    margin-left: auto;
    .card, .filler {
      margin-right: 30px;
    }
  }
}

@media screen and (max-width: 769px) {
  h3 {
    margin-top: 25px;
  }
  .deck {
    .card, .filler {
      margin-left: 20px;
      margin-right: 0px;
    }
  }
}

@media screen and (max-width: 700px) {
  .deck {
    justify-content: center;
    .card, .filler {
      margin-left: 0px;
    }
  }
}

</style>