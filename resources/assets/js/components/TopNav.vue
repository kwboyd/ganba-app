<template lang="html">
  <header>
    <div class="nav-wrapper">
      <h1><span id="title">Ganba!</span><span id="description">Flashcard Quizzes for Advanced Japanese Learners</span></h1>
      <nav>
        <a>Creator</a>
        <a>Styleguide</a>
        <a>Documentation</a>
        <a>GitHub</a>
      </nav>
    </div>
  </header>
</template>

<script>
export default {
}
</script>

<style lang="scss">
@import '../../sass/_variables.scss';

header {
  height: 60px;
  width: 100%;
  background-color: $light-gray;
  box-shadow: 0px 2px 8px #bbbbbb;
  margin-bottom: 25px;
}
.nav-wrapper {
  display: flex;
  align-items: baseline;
  vertical-align: middle;
  height: 40px;
  font-size: 16px;
  width: 98%;
  padding-top: 10px;
  justify-content: space-between;
}
h1 {
  margin-left: 20px;
  font-family: $header-font;
  color: $dark-gray;
  font-weight: 400;
  display: flex;
  align-items: baseline;
}
#description {
  font-size: .5em;
  margin-left: 1.5em;
}
#title {
  font-family: $header-font;
  font-size: 1.1em;
}
nav{
  width: 280px;
  display: flex;
  justify-content: space-between;
  a {
    font-family: $header-font;
    font-size: .8em;
    text-transform: uppercase;
    &:hover {
      color: #52A896;
    }
  }
}
@media screen and (max-width: 769px) {
  header {
    height: 85px;
  }
  .nav-wrapper{
    height: 50px;
    flex-direction: column;
    width: 70%;
    margin-left: auto;
    margin-right: auto;
  }
  nav {
    width: 60%;
    margin-top: 40px;
    margin-left: auto;
    margin-right: auto;
  }
  h1 {
    margin-left: auto;
    margin-right: auto;
  }
}
@media screen and (max-width: 650px) {
  header {
    height: 75px;
  }
  .nav-wrapper {
    width: 70%;
    padding-top: 10px;
    font-size: 14px;
  }
  nav {
    margin-top: 20px;
  }
  #description {
    margin-left: 10px;
    font-size: .5em;
  }
}
@media screen and (max-width: 570px) {
  .nav-wrapper {
    width: 95%;
    font-size: 13px;
  }
}
</style>
