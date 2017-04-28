<template>
  <div id="word-form">
    <h6>Add word to deck:</h6>
    <div id="form-top-line">
      <div class="form-group short-label">
        <label for="word">Word:</label>
        <input maxlength="7" placeholder="Max Length: 7 Char." id="word" type="text" v-model="word" />
      </div>
      <div class="form-group short-label">
        <label for="pronunciation">Pronunciation (optional): </label>
        <input @blur="toKana" maxlength="16" placeholder="Max Length: 16 Char." id="pronunciation" type="text" v-model="pronunciation" />
      </div>
      <div class="form-group meaning-group">
        <label for="meaning">Meaning: </label>
        <input maxlength="40" placeholder="Max Length: 40 Char." id="meaning" type="text" v-model="meaning" />
      </div>
    </div>
    <div class="form-group sentence-group">
      <label for="sentence">Example sentence (optional): </label>
      <textarea maxlength="30" placeholder="Max Length: 30 Char." id="sentence" v-model="sentence"></textarea>
    </div>
    <div class="button-div">
    <button class="primary-button medium" @click="create" :disabled="loading">Add word</button>
    <Loader v-show="loading"></Loader>
  </div>
  <p class="note">*For convenience, pronunciation will be auto-transliterated into furigana, so you can type in furigana or romaji.
    In romaji mode, type in CAPITAL LETTERS for katakana. During quizzes, you can input pronunciation in either furigana or romaji and it will be transliterated as well.</p>
  </div>
</template>

<script>
import axios from 'axios';
import Loader from './Loader';

export default {
  components: {
    Loader
  },

  data() {
    return {
      word: '',
      pronunciation: '',
      meaning: '',
      sentence: '',
      loading: false
    }
  },

  mounted() {
    var pronunInput = document.getElementById('pronunciation');
    wanakana.bind(pronunInput, {IMEMode: true});
  },

  methods: {
    create () {
      // makes sure there isn't already a request in process, sets loading to true, calls request
      console.log('VocabForm -> create');
      if (this.loading) {
        alert('Request already in process.');
        return false;
      }
      // double checks that the pronunciation is converted to furigana
      this.pronunciation = wanakana.toKana(this.pronunciation);
      // capitalizes the meaning input
      this.meaning = this.meaning.toUpperCase();
      this.loading = true;
      this.sendRequest();
    },

    sendRequest () {
      // sends a newly created vocab to the server
      axios.post('/vocabs', {
        word: this.word,
        pronunciation: this.pronunciation,
        meaning: this.meaning,
        sentence: this.sentence
      })
      .then((response) => {
        console.log('VocabForm -> sendRequest success');
        console.log(response.data);
        this.loading = false;
        this.reset();
        this.$emit('created');
      })
      .catch((error) => {
        console.error('VocabForm -> sendRequest error');
        alert("Error. Vocabulary not submitted. Please make sure you have filled out both the word and the meaning fields.")
      });
    },
    toKana () {
      this.pronunciation = wanakana.toKana(this.pronunciation);
    },

    reset () {
      // resets vocab form to empty
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
  input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    text-transform: capitalize;
  }
}

#form-top-line {
  margin-top: 15px;
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
    input {
      text-transform: uppercase;
    }
  }
}

.button-div {
  display: flex;
  .loader {
    width: 45px;
  }
}

.sentence-group {
  width: 100%;
  textarea {
    width: 100%;
    min-height: 30px;
    padding-top: 9px;
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

input, input[type="text"], textarea, select {
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
