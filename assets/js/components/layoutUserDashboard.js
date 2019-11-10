import React from "react";
import { NavLink, Link } from "react-router-dom";
import IconProfile from "../../img/icons/avatar.png";
import IconTeam from "../../img/icons/team.png";
import IconScoreboard from "../../img/icons/scoreboard.png";

const CLASSES = {
  container:
    "min-h-screen w-full poppins bg-gray-100 flex flex-col justify-between relative",
  header: {
    container:
      "w-full h-16 bg-white flex justify-between items-center px-2 border-b border-gray-400 fixed top-0 z-20",
    logo: "text-2xl font-bold",
    logoutBtn:
      "text-md lg:text-lg text-center font-semibold text-black border-2 border-gray-800 rounded px-2 lg:px-4 py-1 mr-1 cursor-pointer hover:text-gray-100 hover:bg-gray-800 "
  },
  mainContent: "flex-1 bg-gray-100 py-16 xl:w-10/12 xl:ml-auto",
  navigation: {
    container:
      "w-full h-16 border-t border-gray-400 flex justify-around px-2 items-center text-sm fixed bottom-0 z-10 bg-white text-center xl:w-2/12 xl:justify-start xl:items-start xl:pt-32 xl:h-screen xl:flex-col",
    links:
      " xl:hover:shadow-lg xl:hover:text-black xl:hover:pointer-cursor xl:hover:border xl:hover:border-gray-200 xl:hover:rounded-lg p-2 xl:flex xl:flex-row xl:items-center xl:justify-start xl:text-lg xl:my-3 xl:w-full xl:mx-auto xl:px-4 ",
    linksActive:
      "text-black font-semibold pont xl:bg-white xl:shadow-lg xl:border xl:border-gray-100 xl:rounded-lg",
    greenDot: "hidden xl:inline-block h-2 w-2 mr-2 bg-green-500 rounded-full"
  }
};

const { container, header, mainContent, navigation } = CLASSES;

const LayoutUserDashboard = ({ handleLogout, location, children }) => (
  <div className={container}>
    <div className={header.container}>
      <Link to="/" className={header.logo}>
        DevCollab
      </Link>
      <Link to="/" onClick={handleLogout} className={header.logoutBtn}>
        Logout
      </Link>
    </div>
    <div className={mainContent}>
      <div className="p-2 lg:p-8">{children}</div>
    </div>
    <div className={navigation.container}>
      <NavLink
        exact
        to="/"
        className={`${navigation.links}`}
        activeClassName={`${navigation.linksActive}`}
      >
        {location.pathname === "/" ? (
          <span className={navigation.greenDot}></span>
        ) : null}
        <img className="mx-auto xl:mx-0 h-6 w-6" src={IconTeam} alt="" />
        <span className="xl:text-lg xl:ml-2">Team</span>
      </NavLink>
      <NavLink
        exact
        to="/profile"
        className={`${navigation.links}`}
        activeClassName={`${navigation.linksActive}`}
      >
        {location.pathname === "/profile" ? (
          <span className={navigation.greenDot}></span>
        ) : null}
        <img className="mx-auto xl:mx-0  h-6 w-6" src={IconProfile} alt="" />
        <span className="xl:text-lg xl:ml-2">Profile</span>
      </NavLink>
      <NavLink
        exact
        to="/scoreboard"
        className={`${navigation.links}`}
        activeClassName={`${navigation.linksActive}`}
      >
        {location.pathname === "/scoreboard" ? (
          <span className={navigation.greenDot}></span>
        ) : null}
        <img className="mx-auto xl:mx-0  h-6 w-6" src={IconScoreboard} alt="" />
        <span className="xl:text-lg xl:ml-2">Scoreboard</span>
      </NavLink>
    </div>
  </div>
);

export default LayoutUserDashboard;
