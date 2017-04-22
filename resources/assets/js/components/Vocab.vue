<template>
  <div>
    <div>
      <div class="live" v-show="!editing">
        <a class="tool" href="#" @click.prevent="remove">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
        <a class="tool" href="#" @click.prevent="editing = true" v-show="!editing">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
        <a class="tool" href="#">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </a>
        <p class="deck-word">{{ vocab.word }}</p>
        <p class="deck-pronunciation">{{ vocab.pronunciation }}</p>
        <p class="deck-meaning">{{ vocab.meaning }}</p>
        <p class="deck-sentence">{{ vocab.sentence }}</p>
      </div>
      <div class="editing" v-show="editing">
        <p>
          <input type="text" v-model="word" />
          <input type="text" v-model="meaning" />
          <input type="text" v-model="pronunciation" />
          <textarea v-model="sentence"></textarea>
        </p>
        <p>
          <button class="btn btn-success" @click="save">Save</button>
          <button class="btn btn-default" @click="cancel">Cancel</button>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {

  props: [
    'vocab'
  ],

  data () {
    return {
      word: this.vocab.word,
      pronunciation: this.vocab.pronunciation,
      meaning: this.vocab.meaning,
      sentence: this.vocab.sentence,
      editing: false
    }
  },

  methods: {

    remove () {
      console.log('Vocab -> remove');
      this.loading = true;
      axios.delete(`/vocabs/${this.vocab.id}`)
        .then((response) => {
          console.log('Vocab -> remove success');
          this.$emit('deleted')
          this.loading = false;
        })
        .catch((error) => {
          console.log('Vocab -> remove error');
          // stop deleting and dont remove from the dom
          // tell the user deletion failed
        });
    },

    save () {
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
          //show the user that it couldn't be updated
        });
    },

    cancel () {
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

.live {
  width: 300px;
  height: 210px;
  background-color: white;
  margin-top: 15px;
  border: 1px solid #aaaaaa;
  box-shadow: 2px 2px 10px #868686;
  position: relative;
  p {
    text-align: center;
  }
  .fa-plus-circle {
    position: absolute;
    left: 240px;
    padding-top: 10px;
    font-size: 2em;
  }
}

.deck-word {
  font-size: 3em;
  padding-top: 40px;
}

.deck-pronunciation {
  font-size: 1.3em;
}

.deck-meaning {
  font-size: 1.1em;
}

.deck-sentence {
  padding-top: 20px;
}

.fa-times {
  color: #E37780;
  font-size: 1.5em;
  padding-top: 10px;
  float: left;
}

.fa-pencil {
  position: absolute;
  left: 245px;
  padding-top: 175px;
  color: #217EBC;
  font-size: 1.4em;
}

</style>
