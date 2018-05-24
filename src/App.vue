<!-- This is like the "main" for vue (for our purposes at least) You make components, and then
add them here etc. This is the main page that displays on the browser -->

<template>
<section id ="App">
  <div>
    <chatbot> </chatbot>
  </div>
</section>
</template>

<!-- Style settings -->
<style lang="sass">
  @import "App.sass"
</style>

<!-- Scripts -->
<script>
import chatbot from './components/chatbot.vue';

export default {
  name: 'app',
  components:{
    'chatbot':chatbot
  },
  data() {
    return{

    }
  },
  methods: {

  }
}
</script>
