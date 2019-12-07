import axios from "axios";

// TODO
// Delete once backend is ready
export const fetchTeams = async setTeams => {
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

export const fetchTeamGithubRepo = async (repo_id, setTeamGithub) => {
    await axios
        .get(`https://api.github.com/repositories/${repo_id}`)
        .then(res => {
            setTeamGithub(res.data);
        })
        .catch(err => console.error(err));
};

export const fetchTeamGithubRepoEvents = async (url, setGithubEvents) => {
    await axios
        .get(`${url}`)
        .then(res => {
            setGithubEvents(res.data);
        })
        .catch(err => console.error(err));
};