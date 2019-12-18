import React from "react";
import { Link } from "react-router-dom";

const BtnRegister = ({ url, smHidden, children }) => (
  <Link
    to={url}
    className={`text-md lg:text-lg text-center font-semibold text-white border-2 border-teal-500 rounded px-2 lg:px-4 py-1 bg-teal-500 shadow-lg hover:bg-teal-600 hover:shadow-xl hover:border-teal-600 cursor-pointer ${smHidden &&
      "hidden sm:inline-block"}`}
  >
    {children}
  </Link>
);

export default BtnRegister;
