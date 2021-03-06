<template lang="html">
<div>
  <TopNav @homeClicked="goHome"></TopNav>
  <transition-group v-if="!mainLoading" name="fade" mode="out-in" tag="div">
    <!-- displays if done loading -->
    <div v-show="!quizMode"  key="1">
      <!-- displays if not in quiz mode -->
      <div class="container">
        <Intro></Intro>
        <VocabForm  @created="fetch"></VocabForm>
          <h6>Your Deck:</h6>
        <div class="deck">
            <!-- checks if there is at least one vocab word -->
            <p v-if="this.vocabs.length == 0">You don't have any words in your deck yet.</p>
            <!-- loops through vocabulary in reverse order so new ones show up on top -->
            <Vocab v-for="(vocab, index) in reverseVocabs" :key="vocab.id"
            :vocab="vocab" @updated="update" @wordRemoved="removeQuizWord"
            @wordAdded="addQuizWord" @deleted="remove"></Vocab>
            <!-- fills in the grid with extra space so elements align properly -->
            <Filler v-if="this.vocabs.length % 3 >= 1"></Filler>
            <Filler v-if="this.vocabs.length % 3 == 1"></Filler>
        </div>
      </div>
      <!-- bottom nav displays only if at least one word added to the quiz -->
      <BottomNav @beginQuiz="quizModeStart" :quizReady="quizReady" :quizVocabs="quizVocabs"></BottomNav>
    </div>
    <div v-if="quizMode" key="2">
      <!-- displays the quizmode cards -->
      <QuizCard @quizDone="finishQuiz" :quizVocabs="quizVocabs"></QuizCard>
    </div>
  </transition-group>
  <transition name="fade">
    <!-- pre-loader for whole page -->
    <MainLoader v-if="mainLoading"></MainLoader>
  </transition>
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
import MainLoader from './MainLoader';

export default {
  components: {
    Intro,
    Vocab,
    VocabForm,
    TopNav,
    Filler,
    BottomNav,
    QuizCard,
    MainLoader
  },
  data () {
    return {
      vocabs: [],
      imeInput: '',
      kanaime: '',
      kanaconverted: '',
      quizVocabs: [],
      quizMode: false,
      mainLoading: false
    }
  },
  mounted () {
    this.mainLoading = true;
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
          this.mainLoading = false;
        })
        .catch((response) => {
          console.log('App -> fetch error');
          // show error
          this.mainLoading = false;
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
@import '../../sass/skeletonforms.scss';

/* General styles */

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

.inline-block {
  display: inline-block;
}

.inline {
  display: inline;
}

.container {
  width: 90%;
  margin: 40px auto;
}

.center {
  margin-left: auto;
  margin-right: auto;
  display: block;
}

/* Header styles */

h1 {
  font-family: $logo-font;
}

h1, h2, h3, h4, h5, h6, p, label, a, ol, li {
  color: $dark-gray;
}

h2, h3, h4, h5, h6 {
  font-family: $header-font;
}

p, label, ol, ul {
  font-family: $body-font;
}

h1 {
  margin-left: 20px;
  font-family: $logo-font;
  font-weight: 400;
  display: flex;
  align-items: baseline;
  font-size: 2.1em;
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
  font-weight: 400;
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
  margin-top: 35px;
  margin-bottom: 15px;
  font-size: 15pt;
}

/* Text styles */

p {
  font-size: 10.5pt;
  font-weight: 400;
}

ol {
  margin-left: 0;
  padding-left: 15px;
  font-size: .9em;
  font-weight: 700;
  li {
    margin-top: 3px;
  }
}

.outside-link {
  color: $teal;
  &:hover {
    color: $dark-teal;
  }
}

ul {
  li {
    list-style-type: square;
  }
}


.note {
  margin-top: 15px;
  font-size: .7em;
}

.text-center {
  text-align: center;
}

.thin {
  font-weight: 400;
}

.regular {
  font-weight: 500;
}

.lead {
  font-weight: 700;
}

.light {
  font-size: .7em;
}

/* Input styles */

textarea {
  resize: none;
  width: 100%;
  min-height: 30px;
  padding-top: 10px;
}

input {
  width: 100%;
}

label {
  font-size: 10pt;
  margin-bottom: 2px;
}

input, input[type="text"], textarea, select {
  font-size: 10pt;
 &:focus {
   border: 1px solid $teal;
 }
}

select {
  width: 150px;
  font-size: 1em;
}

/* Buttons */

.fa-plus-circle {
  color: $teal;
  background-color: white;
  height: .8em;
  font-size: 1.2em;
  border-radius: 100%;
  margin: auto 2px;
}

.primary-button, .danger-button, .info-button {
  color: white;
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

.info-button {
  background-color: $blue;
  border: 1px solid $dark-blue;
  &:hover {
    background-color: $dark-blue;
  }
}

.small {
  height: 22px;
  width: 70px;
  border-radius: 5px;
}

.medium {
  height: 35px;
  width: 100px;
  border-radius: 7px;
}

.large {
  width: 200px;
  height: 25px;
  font-size: .7em;
  border-radius: 5px;
}

/* Deck styles for vocab */

.deck {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin-left: auto;
  margin-right: auto;
}

/* Vue transitions */

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

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
  opacity: 0
}

/* Styleguide styles */

#styles-box {
  h1, h2, h3, h4, h5, h6, p{
    text-align: left;
    margin: 15px 0px;
  }
  ol, ul {
    margin-top: 30px;
  }
  ul {
    margin-bottom: 50px;
  }
  #styles-title {
    text-align: left;
    margin-left: 15%;
    margin-bottom: 30px;
  }
}

.split-box {
  display: flex;
  flex-wrap: wrap;
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  padding-top: 30px;
}

.left {
  width: 28%;
  border-right: 3px solid #bbbbbb;
  h5 {
    text-align: left;
  }
}

.right {
  width: 70%;
}

.color-row {
  display: flex;
  justify-content: space-around;
  margin-bottom: 30px;
}

.color-names {
  font-size: .9em;
  display: inline-block;
  margin-left: 10px;
}

.color-box {
  display: flex;
  align-items: flex-start;
}

.color-square {
  width: 75px;
  height: 75px;
  margin-bottom: 3px;
  display: inline-block;
}

.style-wrapper {
  margin-left: 10%;
}

.button-row {
  display: flex;
  flex-shrink: 0;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 30px;
  flex-wrap: wrap;
}

.style-wrapper {
  textarea {
    height: 70px;
  }
}

/* Styleguide colors */

#red {
  background-color: $red;
}

#dark-red {
  background-color: $dark-red;
}

#beige {
  background-color: $beige;
  border: 3px solid $dark-gray;
}

#light-gray {
  background-color: $light-gray;
}

#teal {
  background-color: $teal;
}

#dark-teal {
  background-color: $dark-teal;
}

#pure-gray {
  background-color: $pure-gray;
}

#dark-gray {
  background-color: $dark-gray;
}

#blue {
  background-color: $blue;
}

#dark-blue {
  background-color: $dark-blue;
}

/* Credits styles */

#credits-box {
  h3 {
    text-align: left;
  }
  ul {
    margin-top: 10px;
  }
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


@media screen and (max-width: 990px) {
  .button-row {
    flex-direction: column;
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
  .split-box {
    flex-direction: column;
    width: 95%;
  }
  .left {
    border-right: none;
    border-bottom: 3px solid #bbbbbb;
  }
  .right {
    width: 100%;
  }
  .color-row:first-child {
    margin-top: 20px;
  }
  .style-wrapper {
    margin-left: 0;
  }
  #styles-box {
    #styles-title {
      margin-bottom: 0px;
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
  .note {
    font-size: .6em;
  }
}

</style>
