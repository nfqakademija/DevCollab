import React from "react";
import { LayoutUserDashboard } from "../components";

const UserHomepage = ({ location, user, handleLogout }) => (
  <LayoutUserDashboard handleLogout={handleLogout} location={location}>
    <h1>USER HOMEPAGE of {user.email}</h1>
  </LayoutUserDashboard>
);

export default UserHomepage;
