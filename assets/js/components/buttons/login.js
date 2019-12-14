import React from "react";
import { Link } from "react-router-dom";

const BtnLogin = ({ url, smHidden, children }) => (
    <Link
        to={url}
        className={`text-md lg:text-lg text-center font-semibold text-black border-2 border-gray-800 rounded px-2 lg:px-4 py-1 mr-1 hover:text-gray-100 hover:bg-gray-800 cursor-pointer ${smHidden && "hidden sm:inline-block"}`}
    >{children}</Link>
    )

export default BtnLogin;