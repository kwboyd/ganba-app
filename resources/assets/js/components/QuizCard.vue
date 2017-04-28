<template lang="html">
  <div class="quizbox">
    <h2>Quiz Mode</h2>
    <h6>Score: {{score}}/{{scoreTotal}}</h6>
  <div class="quiz-card">
      <div v-if="!results">
        <!-- displays the current word index out of the total -->
        <p id="word-count">Word: {{this.wordIndex}}/{{quizVocabs.length}}</p>

        <p class="quiz-word">{{quizVocabs[this.wordIndex].word}}</p>

        <!-- button to show sentence as long as a sentence was entered. toggles between hide and show -->
        <button v-show="quizVocabs[this.wordIndex].sentence != null" class="center info-button large" id="example-button" @click.prevent="showSentence = !showSentence">{{!showSentence ? 'Show example sentence' : 'Hide example sentence'}}</button>

        <p v-show="showSentence" class="quiz-sentence text-center">{{quizVocabs[this.wordIndex].sentence}}</p>

        <!-- shows pronunciation input if a pronunciation was entered -->
        <div v-show="quizVocabs[this.wordIndex].pronunciation != null" class="quiz-group" id="pronun-group">
          <label for="quizpronun">Pronunciation:</label>
          <!-- converts automatically to furigana -->
          <input ref="pronunQuizInput" @blur="toKana" :disabled="!quizzing" maxlength="16" id="quizpronun" type="text" v-model="pronunAnswer" />
          <p class="result correct" v-if="pronunResult == 'correct'">Correct!</p>
          <!-- displays correct pronunciation if answer was wrong -->
          <p class="result incorrect" v-if="pronunResult == 'incorrect'">Incorrect! Correct answer: {{quizVocabs[this.wordIndex].pronunciation}}</p>
        </div>

        <div class="quiz-group">
          <label for="quizmeaning">Meaning:</label>
          <!-- converts automatically to caps -->
          <input :disabled="!quizzing" maxlength="40" id="quizmeaning" type="text" v-model="meaningAnswer" />
          <p class="result correct" v-if="meaningResult == 'correct'">Correct!</span></p>
          <!-- displays correct meaning if answer was wrong -->
          <p class="result incorrect" v-if="meaningResult == 'incorrect'">Incorrect! Correct answer: {{quizVocabs[this.wordIndex].meaning}}</p>
        </div>


          <button v-if="quizzing" @click.prevent="checkAnswers" class="primary-button submit-button medium">Submit</button>

          <transition name="fade">
          <div v-if="!quizzing" class="button-group">
            <!-- switches between next word and finish quiz depending on how many words are left -->
            <button v-if="this.wordIndex + 1 < quizVocabs.length" @click.prevent="nextWord" class="primary-button continue-button medium">Next Word</button>
            <button v-else @click.prevent="results = true" class="primary-button continue-button medium">Finish Quiz</button>
          </div>
        </transition>

    </div>

    <transition name="fade">
      <div v-if="results">
        <!-- shows results if quiz is done -->
        <h2 id="final-score">Final score: {{score}}/{{scoreTotal}}</h2>
        <button @click.prevent="finishQuiz" class="primary-button large center">End Quiz</button>
      </div>
    </transition>


  </div>

  <div class="notes-box">
    <p class="note">*Pronunciation entered in romaji will be auto-converted into furigana. Use CAPS LOCK for katakana.</p>
    <button @click="finishQuiz" id="quit-button" class="danger-button large">Quit quiz</button>
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
      scoreTotal: 0,
      results: false,
      quizPronunInput: ''
    }
  },
  props: [
    'quizVocabs'
  ],
  methods: {
    checkAnswers() {
      // turns off active quizzing mode
      this.quizzing = false;
      // changes pronunciation into furigana so it matches the database
      // necessary because wanakana will not convert the final syllable during typing
      this.pronunAnswer = window.wanakana.toKana(this.pronunAnswer);
      // capitalizes the meaning so it matches the original input
      this.meaningAnswer = this.meaningAnswer.toUpperCase();
      if (this.quizVocabs[this.wordIndex].pronunciation != null) {
        // checks if there is pronunciation for the word
          if (this.pronunAnswer == this.quizVocabs[this.wordIndex].pronunciation) {
            // checks if pronunciation input is correct
            this.pronunResult = 'correct';
            this.score++;
          } else {
            this.pronunResult = 'incorrect';
          };
      }
      if (this.meaningAnswer == this.quizVocabs[this.wordIndex].meaning) {
        // checks if meaning input is correct
        this.meaningResult = 'correct';
        this.score++;
      } else {
        this.meaningResult = 'incorrect';
      }
    },
    resetAnswers () {
      // resets sentence showing, inputs, results, and active quizzing
      this.showSentence = false;
      this.pronunAnswer = '';
      this.meaningAnswer = '';
      this.pronunResult = '';
      this.meaningResult = '';
      this.quizzing = true;
    },
    nextWord () {
      // goes to next word
      if (this.quizVocabs[this.wordIndex].pronunciation != null) {
        // checks if the current word has pronunciation
        // if so, unbinds wanakana from it so it doesn't bind to the next word's meaning input
        window.wanakana.unbind(this.$refs.pronunQuizInput);
      }
      this.resetAnswers();
      this.wordIndex++;
      if (this.quizVocabs[this.wordIndex].pronunciation != null) {
        // checks if the new word has pronunciation
        // if so, binds wanakana to it
        window.wanakana.bind(this.$refs.pronunQuizInput, {IMEMode: true});
      }
    },
    finishQuiz () {
      // emits event to exit quiz mode, resets everything for next quiz
      this.$emit ('quizDone');
      this.wordIndex = 0;
      this.score = 0;
      this.results = false;
      this.resetAnswers();
    },
    toKana () {
      // converts the input to furigana on blur
      // necessary because wanakana will not convert the final syllable during typing
      this.pronunAnswer = window.wanakana.toKana(this.pronunAnswer);
    }
  },
  mounted () {
    // makes sure that everything is reset properly at the start of the quiz
    this.wordIndex = 0;
    this.resetAnswers();

    if (this.quizVocabs[this.wordIndex].pronunciation != null) {
      // checks if the first word has pronunciation
      // if so, binds wanakana to it
      window.wanakana.bind(this.$refs.pronunQuizInput, {IMEMode: true});
    }
    // sets initial top possible score to length to account for meanings
    this.scoreTotal = this.quizVocabs.length;
    for (let w = 0; w < this.quizVocabs.length; w++) {
      // loops through each quiz word
      if (this.quizVocabs[w].pronunciation != null) {
        // if there is pronunciation, adds another point to the possible score
        this.scoreTotal++;
      }
    }
  }
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

/* Quiz card styles */

#word-count {
  position: absolute;
  left: 14px;
  bottom: 14px;
  font-size: .9em;
  font-weight: 700;
}

#quizmeaning {
  text-transform: uppercase;
}

.quizbox {
  position: relative;
  h2 {
    margin-bottom: 5px;
  }
  h6 {
    margin-top: 0px;
    text-align: center;
    margin-bottom: 20px;
  }
}

.quiz-sentence {
  font-size: 1.1em;
  margin-bottom: 10px;
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

.quiz-card {
  margin-bottom: 10px;
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

.notes-box {
  display: flex;
  justify-content: space-between;
  margin-top: 15px;
  margin-right: 10vw;
  margin-left: 10vw;
  margin-bottom: 25px;
  .note {
    margin-top: 4px;
    max-width: 60%;
  }
  button {
    margin-left: 10px;
  }
}

/* Quiz buttons */

#example-button {
  margin-top: 10px;
  margin-bottom: 10px;
}

.submit-button {
  margin-left: auto;
  margin-right: auto;
  display: block;
  margin-top: 25px;
}

.button-group {
  float: right;
  margin-right: 15%;
  margin-top: 0px;
}

#quit-button {
   margin-bottom: 15px;
   margin-top: 5px;
}

/* Results */

.correct, .incorrect {
  font-weight: 500;
}

.correct {
  color: $dark-teal;
}

.incorrect {
  color: $dark-red;
}

.result {
  margin-top: 3px;
}

#final-score {
  margin-top: 18%;
  padding: 0px 25px;
}

@media screen and (max-width: 769px) {
  #word-count {
    font-size: .9em;
  }
  .quiz-word {
    font-size: 3em;
  }
  .quiz-card {
    height: 445px;
  }
}
</style>
