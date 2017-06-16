import React, { Component } from 'react'
import { Container, Loader, Header, Segment } from 'semantic-ui-react'

import { MessageGroup } from './components'
import { fetchMessages } from './utils'

export default class App extends Component {
  state = {
    messages: []
  }

  componentDidMount() {
    this.fetchData()
  }

  fetchData = () => {
    fetchMessages().then(({ data: messages }) => {
      this.setState({ messages })
      setTimeout(this.fetchData, 10000)
    })
  }

  renderContent = () => {
    const { messages } = this.state

    if(messages.length === 0) return <Loader />
    return <MessageGroup messages={messages}/>
  }

  render() {
    return (
      <Container text style={{ paddingTop: '2em' }}>
        <Segment>
          <Header
            as='h2'
            content='Latest activity from @CNN'
            dividing
          />
          {this.renderContent()}
        </Segment>
      </Container>
    )
  }
}
