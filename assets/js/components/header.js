import React from "react";

const CLASSES = {
  header:
    "container mx-auto h-24 flex justify-between items-center poppins px-2 lg:px-0",
  logo: "text-3xl font-bold",
  btnLogin:
    "text-md lg:text-lg font-semibold text-black border-2 border-gray-800 rounded px-2 lg:px-4 py-1 mr-1 hover:text-gray-100 hover:bg-gray-800 cursor-pointer",
  btnSignUp:
    "text-md lg:text-lg font-semibold text-white border-2 border-teal-500 rounded px-2 lg:px-4 py-1 bg-teal-500 shadow-lg hover:bg-teal-600 hover:shadow-xl hover:border-teal-600 cursor-pointer"
};

const Header = () => (
  <header className={CLASSES.header}>
        <span className={CLASSES.logo}>DevCollab</span>
    <nav role="navigation">
                        <a className={CLASSES.btnLogin}>Login</a>
                                <a className={CLASSES.btnSignUp}>Get Started</a>
    </nav>
  </header>
);

export default Header;
