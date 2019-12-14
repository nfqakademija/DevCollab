import axios from "axios";

// TODO -> Delete once backend is ready
export const fetchTeams = async setTeams => {
  await axios
    .get("https://peaceful-plateau-57622.herokuapp.com/teams")
    .then(res => {
      setTeams(res.data);
    })
    .catch(err => console.error(err));
};

// TODO -> Delete once backend is ready
export const fetchUsers = async setUsers => {
  await axios
    .get("https://peaceful-plateau-57622.herokuapp.com/users")
    .then(res => {
      setUsers(res.data);
    })
    .catch(err => console.error(err));
};

// TODO -> Update once backend is ready to send something back
export const fetchTeam = async (teamId, setTeam) => {
  await axios
    .get(`/api/teams/${teamId}`)
    .then(res => {
      setTeam(res.data);
    })
    .catch(err => console.error(err));
};

// TODO -> update once backend is working
export const fetchTeamGithubRepo = async (repo_id, setTeamGithub) => {
  await axios
    .get(`https://api.github.com/repositories/${repo_id}`)
    .then(res => {
      setTeamGithub(res.data);
    })
    .catch(err => console.error(err));
};

// TODO -> update once backend is ready
export const fetchTeamGithubRepoEvents = async (url, setGithubEvents) => {
  await axios
    .get(`${url}`)
    .then(res => {
      setGithubEvents(res.data);
    })
    .catch(err => console.error(err));
};
