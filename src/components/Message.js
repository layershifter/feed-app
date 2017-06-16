import PropTypes from 'prop-types';
import React from 'react';
import { Feed, Icon } from 'semantic-ui-react';

import MessageIcon from './MessageIcon';

const Message = (props) => {
  const {
    avatar,
    content,
    date,
    likes,
    type,
  } = props;

  return (
    <Feed.Event>
      <Feed.Label image={avatar} />
      <Feed.Content>
        <Feed.Summary>
          <Feed.Date>
            {date} via <MessageIcon type={type} />
          </Feed.Date>
        </Feed.Summary>
        <Feed.Extra content={content} text />
        <Feed.Meta>
          <Feed.Like as="span">
            <Icon name="like" />
            {likes} likes
          </Feed.Like>
        </Feed.Meta>
      </Feed.Content>
    </Feed.Event>
  );
};

Message.propTypes = {
  avatar: PropTypes.string.isRequired,
  content: PropTypes.string.isRequired,
  date: PropTypes.string.isRequired,
  likes: PropTypes.number.isRequired,
  type: PropTypes.string.isRequired,
};

export default Message;
