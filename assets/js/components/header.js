import React, { useState } from "react";
import { Link } from "react-router-dom";
import BtnLogin from "../components/buttons/login";
import BtnRegister from "../components/buttons/register";

const Header = () => {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const handleMenu = () => {
    setIsMenuOpen(!isMenuOpen);
  };

  return (
    <header className="container mx-auto h-24 flex justify-between items-center poppins px-2 lg:px-0 relative z-10">
      <Link to="/" className="text-3xl font-bold">
        DevCollab
      </Link>
      <nav role="navigation" className="relative">
        <BtnLogin url={"/login"} smHidden={true}>Login</BtnLogin>
        <BtnRegister url={"/register"} smHidden={true}>Get Started</BtnRegister>
        <button className="sm:hidden text-md lg:text-lg font-semibold text-black border-2 border-gray-800 rounded px-2 lg:px-4 py-1 mr-1 hover:text-gray-100 hover:bg-gray-800 cursor-pointer" onClick={handleMenu}>
          Menu
        </button>
        {isMenuOpen && (
          <div className="absolute top-0 mt-10 h-32 w-48 right-0 bg-white rounded-lg shadow-xl flex flex-col justify-around p-4 z-30">
              <BtnLogin url={"/login"} smHidden={false}>Login</BtnLogin>
              <BtnRegister url={"/register"} smHidden={false}>Get Started</BtnRegister>
          </div>
        )}
      </nav>
    </header>
  );
};

export default Header;
