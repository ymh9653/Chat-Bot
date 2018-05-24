
import { expect } from 'chai'
import { mount } from 'avoriaz'
import sinon from 'sinon'
import chatbot from '../src/components/chatbot.vue'
import Vue from 'vue'

describe('chatbot.vue', () => {

  it('is a component', () => {
    const wrapper = mount(chatbot)
    expect(wrapper.isVueComponent).to.equal(true)
  })

  it('has a textbox for user input', () => {
    const Constructor = Vue.extend(chatbot)
    const vm = new Constructor().$mount()
    expect(vm.$el.querySelector('.queryForm').tagName).to.equal('INPUT')
  })

  it('calls submit when enter is pressed', () => {
    const wrapper = mount(chatbot)
    var callback = sinon.spy(wrapper.submit)
    const queryform = wrapper.find('.queryForm')[0]
    queryform.innerHTML = "hello"
    queryform.trigger('onkeyup.enter')
    Vue.nextTick(() => {
      expect(callback).toHaveBeenCalled()
      done();
    })
  })

  it('renders the correct message on load up', () => {
    const Constructor = Vue.extend(chatbot)
    const vm = new Constructor().$mount()
    expect(vm.$el.textContent).to.contain('AUT Chat bot !')
    expect(vm.$el.textContent).to.contain('Powered by dialogflow')
  })


})
