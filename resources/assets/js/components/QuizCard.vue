<template lang="html">
  <div class="quizbox">
    <h2>Quiz Mode</h2>
    <h6>Score: {{score}}/{{quizVocabs.length * 2}}</h6>
  <div class="quiz-card">
      <div v-if="!results">
        <p id="word-count">Word: {{this.wordIndex}}/{{quizVocabs.length}}</p>
        <p class="quiz-word">{{quizVocabs[this.wordIndex].word}}</p>
        <button class="center info-button button-large" id="example-button" @click.prevent="showSentence = !showSentence">{{!showSentence ? 'Show example sentence' : 'Hide example sentence'}}</button>
        <p v-show="showSentence" class="quiz-sentence text-center">{{quizVocabs[this.wordIndex].sentence}}</p>
        <div class="quiz-group" id="pronun-group">
          <label for="quizpronun">Pronunciation:</label>
          <input :disabled="!quizzing" maxlength="16" id="quizpronun" type="text" v-model="pronunAnswer" />
          <p class="result correct" v-if="pronunResult == 'correct'">Correct!</p>
          <p class="result incorrect" v-if="pronunResult == 'incorrect'">Incorrect! Correct answer: {{quizVocabs[this.wordIndex].pronunciation}}</p>
        </div>
        <div class="quiz-group">
          <label for="quizmeaning">Meaning:</label>
          <input :disabled="!quizzing" maxlength="40" id="quizmeaning" type="text" v-model="meaningAnswer" />
          <p class="result correct" v-if="meaningResult == 'correct'">Correct!</span></p>
          <p class="result incorrect" v-if="meaningResult == 'incorrect'">Incorrect! Correct answer: {{quizVocabs[this.wordIndex].meaning}}</p>
        </div>
          <button v-if="quizzing" @click.prevent="checkAnswers" class="primary-button submit-button">Submit</button>
          <transition name="fade">
          <div v-if="!quizzing" class="button-group">
            <button v-if="this.wordIndex + 1 < quizVocabs.length" @click.prevent="nextWord" class="primary-button continue-button">Next Word</button>
            <button v-else @click.prevent="results = true" class="primary-button continue-button">Finish Quiz</button>
          </div>
        </transition>
    </div>
    <transition name="fade">
    <div v-if="results">
      <h2 id="final-score">Final score: {{score}}/{{quizVocabs.length * 2}}</h2>
      <button @click.prevent="finishQuiz" class="primary-button button-large center">End Quiz</button>
    </div>
  </transition>
  </div>
</div>
</template>

<script>
export default {
  data () {
    return {
      wordIndex: 0,
      pronunAnswer: '',
      meaningAnswer: '',
      showSentence: false,
      meaningResult: '',
      pronunResult: '',
      quizzing: true,
      score: 0,
      results: false
    }
  },
  props: [
    'quizVocabs'
  ],
  methods: {
    checkAnswers() {
      this.quizzing = false;
      if (this.pronunAnswer == this.quizVocabs[this.wordIndex].pronunciation) {
        this.pronunResult = 'correct';
        this.score++;
      } else {
        this.pronunResult = 'incorrect';
      };
      if (this.meaningAnswer == this.quizVocabs[this.wordIndex].meaning) {
        this.meaningResult = 'correct';
        this.score++;
      } else {
        this.meaningResult = 'incorrect';
      }
    },
    resetAnswers () {
      this.showSentence = false;
      this.pronunAnswer = '';
      this.meaningAnswer = '';
      this.pronunResult = '';
      this.meaningResult = '';
      this.quizzing = true;
    },
    nextWord () {
      this.resetAnswers();
      this.wordIndex++;
    },
    finishQuiz () {
      this.$emit ('quizDone');
      this.wordIndex = 0;
      this.score = 0;
      this.results = false;
      this.resetAnswers();
    }
  },
  mounted () {
    this.wordIndex = 0;
    this.resetAnswers();
  }
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

#word-count {
  position: absolute;
  left: 14px;
  bottom: 14px;
  font-size: .9em;
  font-weight: 500;
}

.quizbox {
  h2 {
    margin-bottom: 5px;
  }
  h6 {
    margin-top: 0px;
    text-align: center;
    margin-bottom: 20px;
  }
}

#example-button {
  margin-top: 10px;
  margin-bottom: 10px;
}

.correct, .incorrect {
  font-weight: 500;
}

.quiz-sentence {
  font-size: 1.1em;
  margin-bottom: 10px;
}

.correct {
  color: $dark-teal;
}

.incorrect {
  color: $dark-red;
}

.submit-button {
  margin-left: auto;
  margin-right: auto;
  display: block;
  margin-top: 25px;
}

#final-score {
  margin-top: 20%;
  padding: 0px 25px;
}

#pronun-group {
  margin-bottom: 30px;
}
.quiz-group {
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  label, input {
    display: inline-block;
  }
}
.button-group {
  float: right;
  margin-right: 15%;
  margin-top: 0px;
}
.result {
  margin-top: 3px;
}
.quiz-card {
  margin-bottom: 30px;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  width: 80vw;
  height: 435px;
  background-color: white;
  border: 1px solid #aaaaaa;
  box-shadow: 2px 2px 10px #868686;
}
.quiz-word {
  text-align: center;
  padding-top: 15px;
  font-size: 4em;
}

@media screen and (max-width: 769px) {
  #word-count {
    font-size: .9em;
  }
}
</style>
