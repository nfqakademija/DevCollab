import React, { useContext, useState, useEffect } from "react";
import {
  DashboardLayout
} from "../components";
import { UserContext } from "../context";
import {fetchTeam, fetchTeamGithubRepo, fetchTeamGithubRepoEvents} from "../API";
import axios from "axios";
import { withRouter } from "react-router-dom";
import GithubIcon from "../../img/icons/github.png";

const JoinTeamCard = ({ addUserToTeam }) => (
    <div className="w-full p-2">
      <div className="bg-white shadow-lg w-full p-2 xl:p-4">
        <h1 className="text-center text-4xl font-semibold mb-4">Welcome!</h1>
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
)

const TeammatesCard = ({ teammates }) => (
    <div className="w-full md:w-1/2 p-2">
      <div className="bg-white shadow-lg w-full p-2 xl:p-4">
        <h1 className="text-center text-4xl font-semibold mb-4">My team</h1>
        <div className="px-2">
          <div className="flex flex-wrap -mx-2">
            {teammates.length === 0 && (
                <p className="text-center mt-8">Loading...</p>
            )}
            {teammates.map(myTeammate => (
                <div className="w-full xl:w-1/2 px-2 my-2" key={myTeammate.id}>
                  <div className="p-2 flex items-center bg-gray-100 rounded-lg">
                    <div className="bg-blue-500 h-8 w-8 rounded-full flex justify-center items-center">
                  <span className="text-white text-xl font-semibold">
                    {myTeammate.name && myTeammate.name[0]}
                  </span>
                    </div>
                    <div className="ml-2 text-left text-lg font-semibold">
                      <p>{myTeammate.name}</p>
                      <p className="text-xs text-gray-600 font-medium">
                        {myTeammate.email}
                      </p>
                    </div>
                  </div>
                </div>
            ))}
          </div>
        </div>
      </div>
    </div>
)

const GithubRepoCard = ({ teamGithub, githubEvents }) => (
    <div className="w-full md:w-1/2 p-2">
      <div className="bg-white shadow-lg w-full h-full p-2 xl:p-4">
        <h1 className="text-center text-4xl font-semibold mb-4">Project repository</h1>
        <div className="px-2">
          <div className="flex flex-wrap -mx-2">
            <div className="w-full lg:w-1/2 px-2 my-2 h-auto">
              <div className="p-2 bg-gray-100 rounded-lg text-center h-full">
                <p className="text-black text-xl font-semibold text-center">Repository</p>
                <a
                    href={String(teamGithub.html_url)}
                    target="_blank"
                    without
                    rel="noopener noreferrer"
                >
                  <img src={GithubIcon} alt="" className="mx-auto" />
                </a>
              </div>
            </div>
            <div className="w-full lg:w-1/2 px-2 my-2 h-auto">
              <div className="p-2 bg-gray-100 rounded-lg text-center h-full">
                <p className="text-black text-xl font-semibold text-center">Open issues</p>
                {teamGithub.length === 0 && <p>Loading ...</p>}
                <p className="text-3xl font-semibold text-red-500">
                  {teamGithub.open_issues}
                </p>
              </div>
            </div>
            <div className="w-full px-2 my-2 h-auto">
              <div className="p-2 bg-gray-100 rounded-lg text-center h-full">
                <p className="text-black text-xl font-semibold text-center">Last 10 events</p>
                {githubEvents.length === 0 && <p>Loading ...</p>}
                {githubEvents.slice(0, 10).map(event => (
                    <p className="text-left" key={event.id}>
                      {event.type} by{" "}
                      <span className="font-semibold">
                    {event.actor.display_login}
                  </span>
                    </p>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
);

const HomePage = ({ handleAuth }) => {
  const user = useContext(UserContext);
  const [team, setTeam] = useState(null);
  const [github, setGithub] = useState([])
  const [githubEvents, setGithubEvents] = useState([]);

  useEffect(() => {
    user.team !== null && fetchTeam(user.team, setTeam);
  }, [])

  //TODO-> demo github
  const fake_repo_id = 458058;
  team && github.length === 0 && fetchTeamGithubRepo(fake_repo_id, setGithub);
  github.length !== 0 && githubEvents === 0 && fetchTeamGithubRepoEvents(github.events_url, setGithubEvents)

  const addUserToTeam = e => {
    axios
        .post("/api/jointeam", { "id": user.id })
        .then(res => {
          handleAuth(res.data);
        })
        .catch(err => console.log(err));
    e.preventDefault();
  };
  console.log(github["events_url"]);
  return (
      <DashboardLayout>
        {!user.team ? <JoinTeamCard addUserToTeam={addUserToTeam} /> : (
            <div className="flex flex-wrap">
              {team && <TeammatesCard teammates={team.users}/>}
              {team && <GithubRepoCard teamGithub={github} githubEvents={githubEvents}/>}
            </div>
        )}
      </DashboardLayout>
  );
};

export default withRouter(HomePage);