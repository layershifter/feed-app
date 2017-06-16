import moment from 'moment'
import PropTypes from 'prop-types'
import React, { Component } from 'react'
import { Feed } from 'semantic-ui-react'

import Message from './Message'

export default class MessageGroup extends Component {
  static propTypes = {
    messages: PropTypes.arrayOf(PropTypes.shape({
      avatar: PropTypes.string.isRequired,
      content: PropTypes.string.isRequired,
      date: PropTypes.string.isRequired,
      likes: PropTypes.number.isRequired,
      type: PropTypes.string.isRequired,
    })),
  }

  constructor(...args) {
    super(...args)

    let { messages } = this.props
    messages = this.mapMessages(messages)
    this.state = { messages }
  }

  componentDidMount() {
    this.remapMessages()
  }

  componentWillReceiveProps({ messages }) {
    messages = this.mapMessages(messages)
    this.setState({ messages })
  }

  mapMessages = messages => messages.map(message => {
    const { date: raw } = message
    const date = moment(new Date(raw)).fromNow()

    return { ...message, date }
  })

  remapMessages = () => {
    setTimeout(() => {
      let { messages } = this.props
      messages = this.mapMessages(messages)

      this.setState({ messages })
      this.remapMessages()
    }, 30000)
  }

  render() {
    const { messages } = this.state

    return (
      <Feed>
        {messages.map(message => {
          const { content, type } = message
          const key = `${content}-${type}`

          return (
            <Message
              {...message}
              key={key}
            />
          )
        })}
      </Feed>
    )
  }
}
