/*import chatbot from '@/components/chatbot';
import Vue from 'vue';

const chai = require('chai');
const expect = chai.expect;

console.log("Entered in here");

describe('chatbot.vue', () => {

  it('displays welcome message', () => {

    const Constructor = Vue.extend(chatbot);
    const chatbotComponent = new Constructor().$mount();

    expect(chatbotComponent.$el.textContent).to.contain('AUT Chat bot!')

  })
})
*/

import { expect } from 'chai'
import { mount } from 'avoriaz'
import Foo from '../src/components/Foo.vue'
import chatbot from '../src/components/chatbot.vue'

describe('Foo.vue', () => {
  it('has a root element with class foo', () => {
    const wrapper = mount(Foo)
    expect(wrapper.is('.foo')).to.equal(true)
  })
})

describe('chatbot.vue', () => {
  it('is a component', () => {
    const wrapper = mount(chatbot)
    expect(wrapper.isVueComponent).to.equal(true)
  })
})
