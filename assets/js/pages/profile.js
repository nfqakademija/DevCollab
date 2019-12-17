import React, { useContext, useState, useEffect } from "react";
import { DashboardLayout } from "../components";
import { UserContext } from "../context"
import axios from "axios";

const ProfilePage = ({ history, location }) => {
  const user = JSON.parse(localStorage.getItem("user"))
  const [profile, setProfile] = useState(FAKE_PROFILE);

  //TODO -> delete later
  const FAKE_PROFILE = {
    id: 5,
    name: "Faker",
    lastname: "Fakeroid",
    username: "faaker",
    email: "faker@faker.com",
    location: "London",
    github_username: null,
    short_description: null,
    team: null,
    skills: null,
    roles: ["ROLE_USER"]
  }

  useEffect(() => {
    axios.get("/api/profile", { id: user.id})
      .then(res => setProfile(res.data))
      .catch(error => console.log(error));
  }, [])

  return (
    <DashboardLayout location={location} history={history}>
      <h1>ID: {profile ? profile : "not set"}</h1>
      <h1>NAME: {profile ? profile.name : "not set"}</h1>
      <h1>LASTNAME: {profile ? profile.lastname : "not set"}</h1>
      <h1>USERNAME: {profile ? profile.username : "not set"}</h1>
      <h1>LOCATION: {profile ? profile.location : "not set"}</h1>
      <h1>GITHUB USERNAME: {profile ? profile.github_username : "not set"}</h1>
      <h1>SHORT DESCRIPTION: {profile ? profile.short_description : "not set"}</h1>
      <h1>TEAM: {profile ? profile.team : "not set"}</h1>
      {/*<h1>SKILLS: {profile ? profile.skills.map(skill => `${skill}, `) : "not set"}</h1>*/}
      {/*<h1>ROLES: {profile ? profile.roles.map(role => `${role}, `) : "not set"}</h1>*/}
    </DashboardLayout>
  );
};

export default ProfilePage;
