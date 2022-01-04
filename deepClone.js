const data = {
  key: 'value',
  key2: {
    key: 'innerValue',
    innerKey: {
      anotherKey: 'anotherValue',
    },
  },
};

import isObject from 'lodash/isObject.js';

export default function cloneDeep(obj) {
  const variable = {};
  for (const [key, value] of Object.entries(obj)) {
    isObject(value) ? variable[key] = cloneDeep(value) : variable[key] = value;
  }
  return variable;
};

