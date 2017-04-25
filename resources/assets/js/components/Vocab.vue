<template>
    <div class="card">
      <div v-show="this.loading" class="loader-div">
        <Loader></Loader>
      </div>
      <div class="live" v-show="!editing">
        <a class="tool" href="#" @click.prevent="remove">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
        <a class="tool" href="#" @click.prevent="editing = true" v-show="!editing">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
          <a class="tool" href="#" @click.prevent="addVocab" v-if="!this.addedQuiz">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </a>
          <a class="tool" href="#" @click.prevent="removeVocab" v-if="this.addedQuiz">
            <i class="fa fa-minus-circle" aria-hidden="true"></i>
          </a>
        <p class="deck-word">{{ vocab.word }}</p>
        <p class="deck-pronunciation">{{ vocab.pronunciation }}</p>
        <p class="deck-meaning">{{ vocab.meaning }}</p>
        <p class="deck-sentence">{{ vocab.sentence }}</p>
      </div>
      <div class="editing" v-show="editing">
        <p>
          <input maxlength="7" type="text" v-model="word" />
          <input maxlength="16" type="text" v-model="pronunciation" />
          <input maxlength="40" type="text" v-model="meaning" />
          <textarea maxlength="30" v-model="sentence"></textarea>
        </p>
        <p>
          <button class="primary-button button-small" @click="save">Save</button>
          <button class="danger-button button-small" @click="cancel">Cancel</button>
        </p>
      </div>
    </div>
</template>

<script>
import axios from 'axios';
import Loader from './Loader';

export default {
  components: {
    Loader
  },

  props: [
    'vocab'
  ],

  data () {
    return {
      word: this.vocab.word,
      pronunciation: this.vocab.pronunciation,
      meaning: this.vocab.meaning,
      sentence: this.vocab.sentence,
      editing: false,
      loading: false,
      addedQuiz: false,
    }
  },

  methods: {
    addVocab () {
      // emits event that selected vocab should be added to quiz array, sets added to true
      console.log('Vocab -> add (for quiz)');
      this.$emit('wordAdded', this.vocab);
      this.addedQuiz = true;
    },

    removeVocab () {
      // emits event that selected vocab should be removed from quiz array, sets added to false
      console.log('Vocab -> removeVocab');
      this.$emit('wordRemoved', this.vocab);
      this.addedQuiz = false;
    },

    remove () {
      // removes selected vocab from server
      console.log('Vocab -> remove');
      this.loading = true;
      axios.delete(`/vocabs/${this.vocab.id}`)
        .then((response) => {
          console.log('Vocab -> remove success');
            this.$emit('deleted', this.vocab);
          this.loading = false;

        })
        .catch((error) => {
          console.log('Vocab -> remove error');
        });
    },

    save () {
      // sends changes to updated vocabulary to server
      console.log('Vocab -> save');
      axios.put(`/vocabs/${this.vocab.id}`, {
          word: this.word,
          meaning: this.meaning,
          pronunciation: this.pronunciation,
          sentence: this.sentence
        })
        .then((response) => {
          console.log('Vocab -> save success');
          this.$emit('updated', {
            vocab: this.vocab,
            word: this.word,
            meaning: this.meaning,
            pronunciation: this.pronunciation,
            sentence: this.sentence
          });
          this.editing = false;
        })
        .catch((error) => {
          console.log('Vocab -> save error');
        });
    },

    cancel () {
      // resets edited vocab back to original
      console.log('Vocab -> cancel');
      this.word = this.vocab.word,
      this.pronunciation = this.vocab.pronunciation,
      this.meaning = this.vocab.meaning,
      this.sentence = this.vocab.sentence,
      this.editing = false;
    }
  }
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

.tool > i {
  margin-left: 15px;
}

.card {
  width: 320px;
  height: 210px;
  background-color: white;
  margin-bottom: 25px;
  margin-right: 10px;
  border: 1px solid #aaaaaa;
  box-shadow: 2px 2px 10px #868686;
  position: relative;
  p {
    text-align: center;
  }
  .fa-plus-circle, .fa-minus-circle {
    position: absolute;
    left: 265px;
    margin-top: 6px;
    font-size: 2em;
  }
  .fa-plus-circle {
    &:hover {
      color: $dark-teal;
    }
  }
}

.live {
  padding: 5px;
}

.fa-minus-circle {
  color: $red;
  &:hover {
    color: $dark-red;
  }
}

.editing {
  input, textarea {
    width: 80%;
    margin-top: 3px;
  }
  textarea {
    height: 50px;
  }
  button {
    margin-top: 3px;
  }
  .primary-button {
    float: left;
    margin-left: 10%;
  }
  .danger-button {
    float: right;
    margin-right: 10%;
  }
}

.deck-word {
  font-size: 2.5em;
  padding-top: 40px;
}

.deck-pronunciation {
  font-size: 1.2em;
}

.deck-meaning {
  font-size: .9em;
}

.deck-sentence {
  padding-top: 20px;
  font-size: .8em;
}

.fa-times {
  color: $red;
  font-size: 1.5em;
  margin-top: 9px;
  float: left;
  &:hover {
    color: $dark-red;
  }
}

.fa-pencil {
  position: absolute;
  left: 269px;
  margin-top: 173px;
  color: $blue;
  font-size: 1.4em;
  &:hover {
    color: $dark-blue;
  }
}

.loader-div {
  width: 320px;
  height: 210px;
  position: absolute;
  background-color: rgba(0, 0, 0, 0.3);
  z-index: 100;
  .loader {
    margin-left:23%;
    margin-top: 5%;
    svg {
      height: 180px;
    }
  }
}

@media screen and (max-width: 370px) {
  .card {
    .fa-plus-circle, .fa-minus-circle {
    left: 230px;
    }
     .fa-pencil {
       left: 235px
     }
  }
}

</style>
