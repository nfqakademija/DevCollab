import React, { useState, useContext, useEffect } from "react";
import {
    LayoutUserDashboard,
    TableTeamRepo,
    TableMyTeammates
} from "../components";
import { MyContext } from "../context";
import {
    fetchUsers,
    fetchTeams,
    fetchTeamGithubRepo,
    fetchTeamGithubRepoEvents
} from "../API";

const UserHomepage = ({ history, location }) => {
    const [, user] = useContext(MyContext);
    const [teams, setTeams] = useState([]);
    const [users, setUsers] = useState([]);
    const [teamGithub, setTeamGithub] = useState([]);
    const [githubEvents, setGithubEvents] = useState([]);
    const [myTeammates, setMyTeammates] = useState([]);

    useEffect(() => {
        fetchUsers(setUsers);
        fetchTeams(setTeams);
    }, []);

  const userTeam = teams.filter(team => team.id === user.team_id);

if (users.length > 0 && myTeammates.length === 0) {
    setMyTeammates(
        users.filter(
            teammate => teammate.team_id === user.team_id && teammate.id !== user.id
        )
    );
}

if (userTeam.length > 0 && teamGithub.length === 0) {
    fetchTeamGithubRepo(userTeam[0].repo_id, setTeamGithub);
}

if (teamGithub.length !== 0 && githubEvents.length === 0) {
    fetchTeamGithubRepoEvents(teamGithub.events_url, setGithubEvents);
}

  return (
    <LayoutUserDashboard location={location} history={history}>
      <div className="flex flex-wrap">
        <TableMyTeammates myTeammates={myTeammates} />
        <TableTeamRepo teamGithub={teamGithub} githubEvents={githubEvents} />
      </div>
    </LayoutUserDashboard>
  );
};

export default UserHomepage;
