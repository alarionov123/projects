export default function make(num1, num2) {
  const rat = () => ({
    number1: num1,
    number2: num2,
    getNumer: function getNumer() { return this.number1; },
    getDenom: function getDenom() { return this.number2; },
    toString: function toString() { return `${num1}/${num2}`; },
    add: function add(ratAdd) {
      const first = ratAdd.getNumer();
      const second = ratAdd.getDenom();
      return make((num1 * second + num2 * first), (num2 * second));
    },
  });

  return rat();
}

const rat1 = make(3, 9);
rat1.getNumer(); // 3
rat1.getDenom(); // 9
 
const rat2 = make(10, 3);
 
const rat3 = rat1.add(rat2);
rat3.toString(); // '99/27'
