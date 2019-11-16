import React, { useContext } from "react";
import { LayoutUserDashboard } from "../components";
import { MyContext } from "../context";

const UserHomepage = ({ history, location }) => {
  const [isUserLoggedIn, user] = useContext(MyContext);

  return (
    <LayoutUserDashboard location={location} history={history}>
      <h1>USER HOMEPAGE of {user.email}</h1>
    </LayoutUserDashboard>
  );
};

export default UserHomepage;
