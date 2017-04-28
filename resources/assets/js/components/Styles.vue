<template lang="html">
  <div>
    <TopNav></TopNav>
    <div id="styles-box" class="container">
      <h3 id="styles-title">Styleguide</h3>
      <div class="split-box">
        <div class="left">
          <h5>Colors</h5>
        </div>
        <div class="right">

          <div class="color-row">
            <div class="color-box">
              <div class="color-square" id="beige">
              </div>
              <div class="color-names">
                <p>Beige: </p>
                <p>#FFF6E6</p>
              </div>
            </div>
            <div class="color-box">
              <div class="color-square" id="light-gray">
              </div>
              <div class="color-names">
                <p>Light Gray: </p>
                <p>#FBFBFB</p>
              </div>
            </div>
          </div>

          <div class="color-row">
            <div class="color-box">
              <div class="color-square" id="pure-gray">
              </div>
              <div class="color-names">
                <p>Pure Gray: </p>
                <p>#BBBBBB</p>
              </div>
            </div>
            <div class="color-box">
              <div class="color-square" id="dark-gray">
              </div>
              <div class="color-names">
                <p>Dark Gray: </p>
                <p>#333333</p>
              </div>
            </div>
          </div>

          <div class="color-row">
            <div class="color-box">
              <div class="color-square" id="teal">
              </div>
              <div class="color-names">
                <p>Teal: </p>
                <p>#52A896</p>
              </div>
            </div>
            <div class="color-box">
              <div class="color-square" id="dark-teal">
              </div>
              <div class="color-names">
                <p>Dark Teal: </p>
                <p>#469081</p>
              </div>
            </div>
          </div>

          <div class="color-row">
            <div class="color-box">
              <div class="color-square" id="red">
              </div>
              <div class="color-names">
                <p>Red: </p>
                <p>#E37780</p>
              </div>
            </div>
            <div class="color-box">
              <div class="color-square" id="dark-red">
              </div>
              <div class="color-names">
                <p>Dark Red: </p>
                <p>#C3545E</p>
              </div>
            </div>
          </div>

          <div class="color-row">
            <div class="color-box">
              <div class="color-square" id="blue">
              </div>
              <div class="color-names">
                <p>Blue: </p>
                <p>#217EBC</p>
              </div>
            </div>
            <div class="color-box">
              <div class="color-square" id="dark-blue">
              </div>
              <div class="color-names">
                <p>Dark Blue: </p>
                <p>#1B6494</p>
              </div>
            </div>
          </div>

        </div>
    </div>

    <div class="split-box">
      <div class="left">
        <h5>Typography</h5>
      </div>
      <div class="right">
        <div class="style-wrapper">
          <h4 class="thin">This is the header font Roboto at 400 weight.</h4>
          <h4 class="regular">This is the header font Roboto at 500 weight.</h4>
          <h4 class="lead">This is the header font Roboto at 700 weight.</h4>
          <p class="thin">This is the body font Roboto Slab at 400 weight.</p>
          <p class="lead">This is the body font Roboto Slab at 700 weight. </p>
          <h1>This is a header 1 in Anaheim font.</h1>
          <h2>This is a header 2.</h2>
          <h3>This is a header 3.</h3>
          <h4>This is a header 4.</h4>
          <h5>This is a header 5.</h5>
          <h6>This is a header 6.</h6>
          <p>This is a standard paragraph. </p>
          <p class="lead">This is a .lead paragraph. </p>
          <p class="light">This is a .light paragraph. </p>
        </div>
      </div>
    </div>

    <div class="split-box">
      <div class="left">
        <h5>Buttons</h5>
      </div>
      <div class="right">
        <div class="style-wrapper">
          <h6 class="button-title">Primary buttons</h6>
          <div class="button-row">
            <button class="primary-button small">.small</button>
            <button class="primary-button medium">.medium</button>
            <button class="primary-button large">.large</button>
          </div>
          <h6 class="button-title">Danger buttons</h6>
          <div class="button-row">
            <button class="danger-button small">.small</button>
            <button class="danger-button medium">.medium</button>
            <button class="danger-button large">.large</button>
          </div>
          <h6 class="button-title">Info buttons</h6>
          <div class="button-row">
            <button class="info-button small">.small</button>
            <button class="info-button medium">.medium</button>
            <button class="info-button large">.large</button>
          </div>
        </div>
      </div>
    </div>

    <div class="split-box">
      <div class="left">
        <h5>Inputs</h5>
      </div>
      <div class="right">
        <div class="style-wrapper">
          <h6>Text Input</h6>
          <input type="text"></input>
          <h6>Textarea Input</h6>
          <textarea></textarea>
          <h6>Select Input</h6>
          <select>
            <option value="1">Option</option>
            <option value="2">Option</option>
          </select>
        </div>
      </div>
    </div>

    <div class="split-box">
      <div class="left">
        <h5>Lists</h5>
      </div>
      <div class="right">
        <div class="style-wrapper">
          <ol>
            <li>Ordered list</li>
            <li>Ordered list</li>
            <li>Ordered list</li>
          </ol>
          <ul>
            <li>Unordered list</li>
            <li>Unordered list</li>
            <li>Unordered list</li>
          </ul>
        </div>
      </div>
    </div>

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
@import '../../sass/_variables.scss';
@import '../../sass/skeletonforms.scss';

/* Styleguide styles */

#styles-box {
  h1, h2, h3, h4, h5, h6, p{
    text-align: left;
    margin: 15px 0px;
  }
  ol, ul {
    margin-top: 30px;
  }
  ul {
    margin-bottom: 50px;
  }
  #styles-title {
    text-align: left;
    margin-left: 15%;
    margin-bottom: 30px;
  }
}

.split-box {
  display: flex;
  flex-wrap: wrap;
  width: 70%;
  margin-left: auto;
  margin-right: auto;
  padding-top: 30px;
}

.left {
  width: 28%;
  border-right: 3px solid #bbbbbb;
  h5 {
    text-align: left;
  }
}

.right {
  width: 70%;
}

.color-row {
  display: flex;
  justify-content: space-around;
  margin-bottom: 30px;
}

.color-names {
  font-size: .9em;
  display: inline-block;
  margin-left: 10px;
}

.color-box {
  display: flex;
  align-items: flex-start;
}

.color-square {
  width: 75px;
  height: 75px;
  margin-bottom: 3px;
  display: inline-block;
}

.style-wrapper {
  margin-left: 10%;
}

.button-row {
  display: flex;
  flex-shrink: 0;
  align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 30px;
  flex-wrap: wrap;
}

.style-wrapper {
  textarea {
    height: 70px;
  }
}

/* Styleguide colors */

#red {
  background-color: $red;
}

#dark-red {
  background-color: $dark-red;
}

#beige {
  background-color: $beige;
  border: 3px solid $dark-gray;
}

#light-gray {
  background-color: $light-gray;
}

#teal {
  background-color: $teal;
}

#dark-teal {
  background-color: $dark-teal;
}

#pure-gray {
  background-color: $pure-gray;
}

#dark-gray {
  background-color: $dark-gray;
}

#blue {
  background-color: $blue;
}

#dark-blue {
  background-color: $dark-blue;
}

@media screen and (max-width: 990px) {
  .button-row {
    flex-direction: column;
  }
}

@media screen and (max-width: 769px) {
  .split-box {
    flex-direction: column;
    width: 95%;
  }
  .left {
    border-right: none;
    border-bottom: 3px solid #bbbbbb;
  }
  .right {
    width: 100%;
  }
  .color-row:first-child {
    margin-top: 20px;
  }
  .style-wrapper {
    margin-left: 0;
  }
  #styles-box {
    #styles-title {
      margin-bottom: 0px;
    }
  }
}

</style>
