import axios from "axios";

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

