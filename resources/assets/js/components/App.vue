<template lang="html">
  <div>
  <h1> meow
  {{cat}}</h1>
  <textarea v-model="imeinput" @input="kana()"></textarea>
</div>
</template>

<script>
export default {
  data () {
    return {
      cat: 'preload',
      imeinput: '',
      kanaime: ''
    }
  },
  methods: {
    kana() {
      console.log('woof')
      this.kanaime = wanakana.toKana(this.imeinput);
      this.imeinput = this.kanaime;
    }
  }
}
</script>

<style lang="css">
</style>
