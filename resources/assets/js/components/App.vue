<template lang="html">
<div>
  <TopNav @homeClicked="goHome"></TopNav>
  <!-- <textarea v-model="imeInput" @input="kana()"></textarea> -->
  <transition-group name="fade" mode="out-in" tag="div">
  <div v-show="!quizMode"  key="1">
    <div class="container">
      <Intro></Intro>
      <VocabForm  @created="fetch"></VocabForm>
        <h6>Your Deck:</h6>
      <div class="deck">
          <p v-if="this.vocabs.length == 0">You don't have any words in your deck yet.</p>
          <Vocab v-for="(vocab, index) in reverseVocabs" :key="vocab.id"
          :vocab="vocab" @updated="update" @wordRemoved="removeQuizWord"
          @wordAdded="addQuizWord" @deleted="remove"></Vocab>
          <Filler v-if="this.vocabs.length % 3 >= 1"></Filler>
          <Filler v-if="this.vocabs.length % 3 == 1"></Filler>
      </div>
    </div>
    <BottomNav @beginQuiz="quizModeStart" :quizReady="quizReady" :quizVocabs="quizVocabs"></BottomNav>
  </div>
  <div v-if="quizMode" key="2">
    <QuizCard @quizDone="finishQuiz" :quizVocabs="quizVocabs"></QuizCard>
  </div>
</transition-group>

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
import QuizCard from './QuizCard';

export default {
  components: {
    Intro,
    Vocab,
    VocabForm,
    TopNav,
    Filler,
    BottomNav,
    QuizCard
  },
  data () {
    return {
      vocabs: [],
      imeInput: '',
      kanaime: '',
      kanaconverted: '',
      quizVocabs: [],
      quizMode: false,
    }
  },
  mounted () {
    this.fetch();
    // fetches data from server when app loads
  },

  computed: {
    reverseVocabs: function() {
      return this.vocabs.reverse();
      // reverses order of the vocab array so new ones show up in the first spot
    },
    quizReady: function() {
      // checks if there is at least one word in the quiz array, disables start quiz button if not
      if (this.quizVocabs.length > 0) {
        return true
      } else {
        return false
      }
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
    addQuizWord(vocab) {
      // adds selected vocab to quizVocabs
      this.quizVocabs.push(vocab);
    },
    goHome() {
      // exits quiz mode when home link clicked
      this.quizMode = false;
    },
    removeQuizWord(vocab) {
      // removes selected vocab from quizVocabs
      var wordPosition = this.quizVocabs.indexOf(vocab);
      this.quizVocabs.splice(wordPosition, 1);
    },
    fetch () {
      // fetches all of the vocabs from server
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
      // updates the vocabs array after a change
      var i = this.vocabs.indexOf(data.vocab);
      for (var d in data) {
        var vocab = this.vocabs[i];
        if (d === 'vocab') continue;
        vocab[d] = data[d];
      }
    },

    remove (vocab) {
      // removes vocab from vocabs array after it's been deleted
      let currentVocab = vocab;
      let currentIndex = this.vocabs.indexOf(currentVocab);
      this.vocabs.splice(currentIndex, 1);
      let quizVocabIndex = this.quizVocabs.indexOf(currentVocab);
      if (quizVocabIndex > -1) {
        // checks if the removed vocab was added to the quiz array, removes it from that array
        this.quizVocabs.splice(quizVocabIndex, 1);
      }

    },
    quizModeStart () {
      // launch quiz mode
      this.quizMode = true;
    },
    finishQuiz () {
      // exit quiz mode
      this.quizMode = false;
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
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

h1 {
  font-family: $logo-font;
}

h1, h2, h3, h4, h5, h6, p, label, a {
  color: $dark-gray;
}

h2, h3, h4, h5, h6 {
  font-family: $header-font;
}

p, label {
  font-family: $body-font;
}

h2, h5, h6 {
  font-weight: 500;
}

h2 {
  font-size: 3.5em;
  text-align: center;
  margin-top: 30px;
}

h3 {
  font-size: 3em;
  text-align: center;
  margin-top: 30px;
  font-weight: 700;
}

h4 {
  margin-bottom: 15px;
  font-size: 1.8em;
}

h5 {
  text-align: center;
  margin-top: 0px;
  margin-bottom: 30px;
  font-size: 1.3em;
  font-weight: 500;
}

h6 {
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

.inline-block {
  display: inline-block;
}

.inline {
  display: inline;
}

h1 {
  margin-left: 20px;
  font-family: $logo-font;
  color: $dark-gray;
  font-weight: 400;
  display: flex;
  align-items: baseline;
  font-size: 2.1em;
}

.container {
  width: 90%;
  margin: 40px auto;
}

.fa-plus-circle {
  color: $teal;
  background-color: white;
  height: .8em;
  font-size: 1.5em;
  border-radius: 100%;
  margin: auto 2px;
}

.primary-button, .danger-button, .info-button {
  height: 35px;
  width: 100px;
  color: white;
  border-radius: 7px;
  // border: 1px solid #747474;
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
  border: 1px solid $dark-teal;
  &:hover {
    background-color: $dark-teal;
  }
}

.danger-button {
  background-color: $red;
  border: 1px solid $dark-red;
  &:hover {
    background-color: $dark-red;
  }
}

.button-small {
  height: 22px;
  width: 70px;
  border-radius: 5px;
}

.text-center {
  text-align: center;
}

.center {
  margin-left: auto;
  margin-right: auto;
  display: block;
}

.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active for <2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

.info-button {
  background-color: $blue;
  border: 1px solid $dark-blue;
  &:hover {
    background-color: $dark-blue;
  }
}

.button-large {
  width: 200px;
  height: 25px;
  font-size: .7em;
  border-radius: 5px;
}

.deck {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0
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
    font-size: 2.7em;
    word-break: keep-all;
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
