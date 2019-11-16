import axios from "axios";

export const fetchTeams = async (teams, setTeams) => {
  await axios
    .get("https://peaceful-plateau-57622.herokuapp.com/teams")
    .then(res => {
      setTeams(res.data);
    })
    .catch(err => console.error(err));
};

// TODO
// Change to post request once backend is ready to send out token
export const fetchUsers = async setUsers => {
  await axios
    .get("https://peaceful-plateau-57622.herokuapp.com/users")
    .then(res => {
      setUsers(res.data);
    })
    .catch(err => console.error(err));
};
