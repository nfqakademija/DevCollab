import React, { useState } from "react";
import { Link } from 'react-router-dom';
import { MyContext }from '../context';

const CLASSES = {
    header: "container mx-auto h-24 flex justify-between items-center poppins px-2 lg:px-0 relative z-10",
    logo: "text-3xl font-bold",
    nav: "relative",
    btnLogin: "text-md lg:text-lg text-center font-semibold text-black border-2 border-gray-800 rounded px-2 lg:px-4 py-1 mr-1 hover:text-gray-100 hover:bg-gray-800 cursor-pointer",
    btnSignUp: "text-md lg:text-lg text-center font-semibold text-white border-2 border-teal-500 rounded px-2 lg:px-4 py-1 bg-teal-500 shadow-lg hover:bg-teal-600 hover:shadow-xl hover:border-teal-600 cursor-pointer",
    btnMenu: "sm:hidden text-md lg:text-lg font-semibold text-black border-2 border-gray-800 rounded px-2 lg:px-4 py-1 mr-1 hover:text-gray-100 hover:bg-gray-800 cursor-pointer",
    mobileMenu: "absolute top-0 mt-10 h-32 w-48 right-0 bg-white rounded-lg shadow-xl flex flex-col justify-around p-4 z-30"
}

const Header = () => {
    const [isMenuOpen, setIsMenuOpen] = useState(false);

    const handleMenu = () => {
        setIsMenuOpen(!isMenuOpen)
    }

    return (
        <header className={CLASSES.header} >
            <Link to="/" className={CLASSES.logo}>DevCollab</Link>
            <nav role="navigation" className={CLASSES.nav}>
                <Link to="/login" className={`${CLASSES.btnLogin} hidden sm:inline-block`}>Login</Link>
                <Link to="/register" className={`${CLASSES.btnSignUp} hidden sm:inline-block`}>Get Started</Link>
                <button className={CLASSES.btnMenu} onClick={handleMenu}>Menu</button>
                { isMenuOpen && (
                    <div className={CLASSES.mobileMenu}>
                        <Link to="/login" className={CLASSES.btnLogin} onClick={handleMenu}>Login</Link>
                        <Link to="/register" className={CLASSES.btnSignUp} onClick={handleMenu}>Get Started</Link>
                    </div>
                )}
            </nav>
        </header>
    )
}

export default Header;