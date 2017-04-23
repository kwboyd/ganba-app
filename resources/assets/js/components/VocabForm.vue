<template>
  <div id="word-form">
    <h3>Add word to deck:</h3>
    <div id="form-top-line">
      <div class="form-group short-label">
        <label for="word">Word:</label>
        <input maxlength="7" placeholder="Max length: 7 char." id="word" type="text" v-model="word" />
      </div>
      <div class="form-group short-label">
        <label for="pronunciation">Pronunciation (if applicable): </label>
        <input maxlength="16" placeholder="Max length: 16 char." id="pronunciation" type="text" v-model="pronunciation" />
      </div>
      <div class="form-group meaning-group">
        <label for="meaning">Meaning: </label>
        <input maxlength="40" placeholder="Max length: 40 char." id="meaning" type="text" v-model="meaning" />
      </div>
    </div>
    <div class="form-group sentence-group">
      <label for="sentence">Example sentence: </label>
      <textarea maxlength="30" placeholder="Max length: 30 char." id="sentence" v-model="sentence"></textarea>
    </div>
    <button class="primary-button" @click="create">Add word</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {

  data() {
    return {
      word: '',
      pronunciation: '',
      meaning: '',
      sentence: ''
    }
  },

  methods: {
    create () {
      console.log('VocabForm -> create');
      this.sendRequest();
    },

    sendRequest () {
      axios.post('/vocabs', {
        word: this.word,
        pronunciation: this.pronunciation,
        meaning: this.meaning,
        sentence: this.sentence
      })
      .then((response) => {
        console.log('VocabForm -> sendRequest success');
        console.log(response.data);
        this.reset();
        this.$emit('created');
      })
      .catch((error) => {
        console.error('VocabForm -> sendRequest error');
        // show an error message
      });
    },

    reset () {
      this.word = '';
      this.pronunciation = '';
      this.meaning = '';
      this.sentence = '';
    }
  }
};
</script>

<style lang="scss">
@import '../../sass/_variables.scss';
@import '../../sass/skeletonforms.scss';

#word-form {
  width: 100%;
}

#form-top-line {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin-bottom: 20px;
  .form-group {
    width: 20%;
  }
  .meaning-group {
    width: 30%;
  }
}

.sentence-group {
  width: 100%;
  textarea {
    width: 100%;
    min-height: 40px;
  }
}

.max-length {
  font-size: .8em;
}

input {
  width: 100%;
}

label {
  font-size: 10pt;
  margin-bottom: 2px;
}

input, textarea {
  font-size: 10pt;
 &:focus {
   border: 1px solid $teal;
 }
}

@media screen and (max-width: 950px) {
  #form-top-line {
    margin-bottom: 0px;
    .form-group {
      width: 300px;
      margin-bottom: 15px;
    }
    .meaning-group {
      width: 100%;
    }
  }
  .sentence-group {
    textarea {
      min-height: 60px;
    }
  }
}
</style>
