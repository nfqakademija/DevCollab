import React from "react";
import { Header } from "./index";

const Layout = ({ isMenuOpen, handleMenu, isUserLoggedIn, children }) => (
  <div className="min-h-screen flex flex-col justify-between relative">
    {!isUserLoggedIn && (
      <Header isMenuOpen={isMenuOpen} handleMenu={handleMenu} />
    )}
    <main className="flex-1">{children}</main>
  </div>
);

export default Layout;
