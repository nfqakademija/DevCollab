import React, { useContext } from "react";
import {
  DashboardLayout
} from "../components";
import { UserContext } from "../context";
import axios from "axios";
import { withRouter } from "react-router-dom";

const SignTeamCard = ({ addUserToTeam }) => (
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

const HomePage = () => {
  const user = useContext(UserContext);

  const addUserToTeam = e => {
    axios
      .post("/api/jointeam", { id: user.id })
      .then(res => console.log(res))
      .catch(err => console.log(err));
    e.preventDefault();
  };

  return (
    <DashboardLayout>
      {!user.team ? <SignTeamCard addUserToTeam={addUserToTeam} /> : (
        <div className="flex flex-wrap">
        </div>
      )}
    </DashboardLayout>
  );
};

export default withRouter(HomePage);
