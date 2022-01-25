const user1 = makeUser({
  friends: [
    makeUser({ id: 1 }),
    makeUser({ id: 2 }), // общий друг
  ],
});
const user2 = makeUser({
  friends: [
    makeUser({ id: 2 }), // общий друг
    makeUser({ id: 3 }),
  ],
});
 
getMutualFriends(user1, user2); // [ { friends: [], id: 2, getFriends: [Function: getFriends] } ]


export default ({ id = null, friends = [] } = {}) => ({
  friends,
  id,
  getFriends() {
    return this.friends.slice(); // возвращение копии массива, чтобы его не изменили извне
  },
});

export function getMutualFriends(user1, user2) {
  const listOfFriends1 = user1.getFriends();
  const listOfFriends2 = user2.getFriends();
  const mapp = listOfFriends2.map((user) => user.id);
  return listOfFriends1.filter((user) => user.id == mapp.filter(resultuser => resultuser == user.id));
}
