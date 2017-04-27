<template lang="html">
  <div id="credits-box">
  <TopNav></TopNav>
  <div class="container">
  <h3>Credits:</h3>
  <ul>
    <li>Created by <a target="_blank" class="outside-link" alt="Kate Boyd Portfolio" href="http://kwboyd.com">Kate Boyd</a></li>
    <li>Created using <a target="_blank" class="outside-link" alt="Laravel" href="https://laravel.com/">Laravel</a> and <a target="_blank" class="outside-link" alt="Vue.js" href="https://vuejs.org/">Vue.js</a></li>
    <li>Loader icon from <a target="_blank" class="outside-link" alt="Loading.io" href="https://loading.io/">Loading.io</a></li>
    <li>Japanese transliteration from <a target="_blank" class="outside-link" alt="Wanakana.js" href="http://wanakana.com/">Wanakana.js</a></li>
  </ul>
</div>
</div>
</template>

<script>
import TopNav from './TopNav';
export default {
  components: {
    TopNav
  }
}
</script>

<style lang="scss">
#credits-box {
  h3 {
    text-align: left;
  }
  ul {
    margin-top: 10px;
  }
}
</style>
