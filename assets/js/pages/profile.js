import React, { useContext } from "react";
import { LayoutUserDashboard } from "../components";
import { MyContext } from "../context";

const ProfilePage = ({ history, location }) => {
  const [isUserLoggedIn, user] = useContext(MyContext);

  return (
    <LayoutUserDashboard location={location} history={history}>
      <h1>PROFILE PAGE of {user.email}</h1>
    </LayoutUserDashboard>
  );
};

export default ProfilePage;
