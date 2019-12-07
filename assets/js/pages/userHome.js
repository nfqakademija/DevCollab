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

  //TODO -> once backend is ready send post req to backend to do its magic and add user to team
  const addUserToTeam = e => {
    e.preventDefault();
  };

  return (
    <LayoutUserDashboard location={location} history={history}>
      {!user.team ? (
        <div className="w-full p-2">
          <div className="bg-white shadow-lg w-full p-2 xl:p-4">
            <h1 className="text-center text-4xl font-semibold mb-4">
              Welcome!
            </h1>
            <p>
              Hi, this projects main goal is to help you to improve your
              teamwork/coding in team skills.
              <br />
              <br />
              Rules are simple:
              <br />
              <br /> * Be nice
              <br /> * Have fun
            </p>
            <button
              onClick={addUserToTeam}
              className="inline-block text-md lg:text-lg font-semibold bg-teal-500 rounded px-4 py-2 text-white my-2 mr-2 hover:bg-teal-600 util-shadow-green"
            >
              Join team
            </button>
          </div>
        </div>
      ) : (
        <div className="flex flex-wrap">
          <TableMyTeammates myTeammates={myTeammates} />
          <TableTeamRepo teamGithub={teamGithub} githubEvents={githubEvents} />
        </div>
      )}
    </LayoutUserDashboard>
  );
};

export default UserHomepage;
