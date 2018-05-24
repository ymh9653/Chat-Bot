<template>
  <div class="foo">
    <h1></h1>
    <button id="change-message" @click="changeMessage">Change message</button>
	  <p></p>
  </div>
</template>

<script>
export default {
  name: 'hello',
  data() {
    return {
      msg: 'Welcome to Your Vue.js App'
    };
  },
  props: ['passedProp'],
  methods: {
    changeMessage() {
      this.msg = 'new message'
    }
  }
}
</script>
