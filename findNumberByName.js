const phoneBook = [
  { name: 'Alex Bowman', number: '48-2002' },
  { name: 'Aric Almirola', number: '10-1001' },
  { name: 'Bubba Wallace', number: '23-1111' },
];

export default (phonebook, target) => {
  if (phonebook.length === 0) return null;
  let start = 0
  let end = phonebook.length - 1;
  let middle;
  while (start <= end) {
    middle = Math.floor((start + end) / 2);
    if (target === phonebook[middle].name) {
      return phonebook[middle].number;
    } else if (phonebook[middle].name < target) {
      start = middle + 1;
    } else {
      end = middle - 1;
    }
  };
  return phonebook[middle].number;
};
