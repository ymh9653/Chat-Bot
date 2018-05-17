<!-- This is like the "main" for vue (for our purposes at least) You make components, and then
add them here etc. This is the main page that displays on the browser -->

<template>
<section id ="App">
  <main>
    <!--<iframe
      width="350"
      height="430"
      src="https://console.dialogflow.com/api-client/demo/embedded/486f461e-a2ea-4e91-8527-ecf3798d6e5f">
    </iframe>
  -->
    <div class="wrapper ai-window">
      <br>
      <br>
      <h1>
        AUT Chat bot !
      </h1>
      <h2>
        Made by AUT chatbot team 4<br>
        Powered by Vue.js
      </h2>

      <table v-for= "a in answers" class="chat-window">
        <tr>
          <td class="bubble">
            {{a.result.resolvedQuery}}
          </td>
        </tr>

        <tr>
          <td>

            <div v-if="a.result.fulfillment.speech" class="bubble bot">
              {{a.result.fulfillment.speech}}
            </div>

          </td>
        </tr>

      </table>
      <br>
    </div>

    <section id = "textBox">
      <div class="query">
        <input aria-label="Please enter something" autocomplete="off" v-model="query" class="queryForm" @keyup.enter="submit" placeholder="Please enter something" autofocus type="text">
      </div>
    </section>

    <a id="bottom"></a>
  </main>
</section>
</template>

<!-- Style settings -->
<style lang="sass">
  @import "App.sass"
</style>

<!-- Scripts -->
<script>
import { ApiAiClient } from 'api-ai-javascript'
const client = new ApiAiClient({accessToken: '1b2114637d8e4d6291730755a6d737df'})

export default {
  name: 'app',
  data(){
    return{
      answers: [],
      query: ''

    }
  },
  watch: {
    answers: function(val){
      setTimeout(() => {
        document.querySelector('#bottom').scrollIntoView({
          behaviour: 'smooth'
        })
      }, 2)
    }
  },

  methods:{
    submit: function(event){

      if(event.key == "Enter")
      {
        client.textRequest(this.query).then((response) => {
          console.log(response);
          this.answers.push(response)
          this.query = ''
          console.log(this.answers)

        })
      }
    }
  }
}
</script>
