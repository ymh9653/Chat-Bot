<!-- This is like the "main" for vue (for our purposes at least) You make components, and then
add them here etc. This is the main page that displays on the browser -->

<template>
  <div>
    <text-box></text-box>
  </div>
</template>

<script>
import textBox from './components/textBox.vue';

export default {
  components:{
    'text-box':textBox
  },
  data(){
    return{

    }
  },
  methods:{

  }
}
</script>
