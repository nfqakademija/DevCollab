import React, { useState, useEffect, useContext } from "react";
import { MyContext } from "../context";
import { LayoutUserDashboard } from "../components";
import { dynamicSort, capitalize } from "../utils";
import GithubIcon from "../../img/icons/github.png";
import { fetchTeams } from "../API";

const CLASSES = {
  scoreboard: {
    container: "bg-white shadow-lg p-8 w-full xl:w-1/2 mx-auto",
    title: "text-center text-4xl font-semibold",
    thead: "flex justify-between px-2 xl:px-4 text-sm text-gray-600 -mb-2",
    teams: {
      card:
        "p-2 xl:p-4 my-4 text-lg xl:text-xl rounded-lg border-2 flex justify-between items-center",
      activeCard: "border-green-500 font-semibold shadow-xl",
      points: "ml-2 border-l-2 px-4 w-16 text-center text-2xl block"
    }
  }
};

const { scoreboard } = CLASSES;

const ScoreboardPage = ({ history, location }) => {
  const [, user] = useContext(MyContext);
  const [teams, setTeams] = useState([]);

  useEffect(() => {
    fetchTeams(teams, setTeams);
  }, []);

  const sortedTeams = teams.sort(dynamicSort("points", "desc"));

  return (
    <LayoutUserDashboard location={location} history={history}>
      <div className={scoreboard.container}>
        <h1 className={scoreboard.title}>
          Score<span className="text-blue-500">Board</span>
        </h1>
        <div className={scoreboard.thead}>
          <span>Team name</span>
          <span className="px-4 w-20 text-center">Points</span>
        </div>
        {sortedTeams.map(team => {
          return (
            <div
              key={team.id + team.name}
              className={`${scoreboard.teams.card} ${team.id === user.team_id &&
                scoreboard.teams.activeCard}`}
            >
              <h2>{capitalize(team.name)}</h2>
              <div className="flex items-center">
                <a href={team.github_repo}>
                  <img
                    src={GithubIcon}
                    alt="GitHub icon"
                    className="mx-2 h-6 w-6"
                  />
                </a>
                <span className={scoreboard.teams.points}>{team.points}</span>
              </div>
            </div>
          );
        })}
      </div>
    </LayoutUserDashboard>
  );
};

export default ScoreboardPage;
