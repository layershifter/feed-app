import PropTypes from 'prop-types';
import React from 'react';
import { Icon } from 'semantic-ui-react';

const PROPS = {
  twitter: { color: 'blue', name: 'twitter' },
};

const MessageIcon = ({ type }) => <Icon {...PROPS[type]} />;

MessageIcon.propTypes = {
  type: PropTypes.string.isRequired,
};

export default MessageIcon;
