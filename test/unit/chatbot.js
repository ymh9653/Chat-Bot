import chatbot from '@/components/chatbot';
import Vue from 'vue';

describe('chatbot.vue', () => {

  it('displays welcome message', () => {

    const Constructor = Vue.extend(chatbot);
    const chatbotComponent = new Constructor().$mount();

    expect(chatbotComponent.$el.textContent).to.contain('AUT Chat bot!')

  })
})
