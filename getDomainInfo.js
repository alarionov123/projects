import _ from 'lodash';

export default function getDomainInfo(str) {
  let scheme = str.split(':');
  const name = _.last(str.split('/'));
  if (str.startsWith('http')) {
    scheme = scheme[0];
  } else {
    scheme = 'http';
  }
  return { scheme, name };
}
