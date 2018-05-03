<!-- The textbox. To EDIT later) -->

<template>
  <div id ="text-box">
    <h2>Enter your text</h2>
    <form>
      <input type="text" v-model="content" placeholder="Enter text here!" />
    </form>
    <div id="preview">
      <h3>Preview text</h3>
      <p>Preview: {{ content }}</p>
    </div>

  </div>
</template>

<script>
export default {
  data(){
    return{
      content:""
    }
  },
  methods:{
  }
}
</script>
