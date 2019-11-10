import React from "react";
import { LayoutUserDashboard } from "../components";

const ProfilePage = ({ location, user, handleLogout }) => (
  <LayoutUserDashboard handleLogout={handleLogout} location={location}>
    <h1>PROFILE PAGE of {user.email}</h1>
  </LayoutUserDashboard>
);

export default ProfilePage;
