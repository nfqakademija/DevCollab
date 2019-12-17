import React, { useState, useEffect, useContext } from "react";
import { UserContext } from "../context";
import { DashboardLayout } from "../components";
import { dynamicSort, capitalize } from "../utils";
import GithubIcon from "../../img/icons/github.png";
import axios from "axios";

const ScoreboardTeamCard = ({team, user}) => (
  <div
    key={team.id + team.name}
    className={`p-2 xl:p-4 my-4 text-lg xl:text-xl rounded-lg border-2 flex justify-between items-center ${team.id === user.team &&
      "border-green-500 font-semibold shadow-xl"}`}
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
      <span className="ml-2 border-l-2 px-4 w-16 text-center text-2xl block">{Math.floor(Math.random() * 100 + 1)}</span>
    </div>
  </div>
)

const ScoreboardPage = ({ history, location }) => {
  const user = useContext(UserContext);
  const [teams, setTeams] = useState([]);

  useEffect(() => {
    axios.get("/api/teams")
    .then(res => setTeams(res.data))
    .catch(error => console.log(error))
  }, [])

  const sortedTeams = teams.sort(dynamicSort("points", "desc"));

  return (
    <DashboardLayout>
      <div className="bg-white shadow-lg p-8 w-full xl:w-1/2 mx-auto">
        <h1 className="text-center text-4xl font-semibold">
          Score<span className="text-blue-500">Board</span>
        </h1>
        <div className="flex justify-between px-2 xl:px-4 text-sm text-gray-600 -mb-2">
          <span>Team name</span>
          <span className="px-4 w-20 text-center">Points</span>
        </div>
        {teams.length === 0 ? (
          <h1 className="text-center mt-16">Loading...</h1>
         ) : sortedTeams.map(team => <ScoreboardTeamCard team={team} user={user} />)}
      </div>
    </DashboardLayout>
  );
};

export default ScoreboardPage;


// const CLASSES = {
//   scoreboard: {
//     container: "bg-white shadow-lg p-8 w-full xl:w-1/2 mx-auto",
//     title: "text-center text-4xl font-semibold",
//     thead: "flex justify-between px-2 xl:px-4 text-sm text-gray-600 -mb-2",
//     teams: {
//       card:
//         "p-2 xl:p-4 my-4 text-lg xl:text-xl rounded-lg border-2 flex justify-between items-center",
//       activeCard: "border-green-500 font-semibold shadow-xl",
//       points: "ml-2 border-l-2 px-4 w-16 text-center text-2xl block"
//     }
//   }
// };

// const { scoreboard } = CLASSES;

{/* <div
  key={team.id + team.name}
  className={`p-2 xl:p-4 my-4 text-lg xl:text-xl rounded-lg border-2 flex justify-between items-center ${team.id === user.team &&
    "border-green-500 font-semibold shadow-xl"}`}
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
    <span className="ml-2 border-l-2 px-4 w-16 text-center text-2xl block">{Math.floor(Math.random() * 100 + 1)}</span>
  </div>
</div> */}