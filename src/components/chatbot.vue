<!-- This is like the "main" for vue (for our purposes at least) You make components, and then
add them here etc. This is the main page that displays on the browser -->

<template>
  <div class="chatbot">
    <div class="wrapper ai-window">
      <br>
      <br>
      <h1>
        AUT Chat bot !
      </h1>
      <h2>
        Made by AUT chatbot team 4<br>
        Created in Vue.js<br>
        Powered by dialogflow
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
  </div>
</template>

<!-- Scripts -->
<script>
import { ApiAiClient } from 'api-ai-javascript'
const client = new ApiAiClient({accessToken: '1b2114637d8e4d6291730755a6d737df'})

export default {
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
        client.textRequest(this.query).then((response) =>
        {
          this.answers.push(response)
          this.query = ''
        })
      }
    }
  }
}
</script>
