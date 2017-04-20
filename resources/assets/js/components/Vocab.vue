<template>
  <div class="Contact panel panel-default">
    <div class="panel-body">
      <div class="live" v-show="!editing">
        {{ vocab.word }} {{ vocab.meaning }}
        {{ vocab.pronunciation }} {{ vocab.sentence }}
        <a class="tool" href="#" @click.prevent="remove">
          <i class="glyphicon glyphicon-remove"></i>
        </a>

      <a class="tool" href="#" @click.prevent="editing = true" v-show="!editing">
        <i class="glyphicon glyphicon-pencil"></i>
      </a>
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

<style>
.tool > i {
  margin-left: 15px;
}
</style>
