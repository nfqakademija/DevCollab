import React, { useState } from 'react';

export const MyContext = React.createContext();

const AppProvider = ({ children }) => {
    const [isUserLoggedIn, setIsUserLoggedIn] = useState(localStorage.getItem("isLoggedIn"));
    const [user, setUser] = useState({});
    
    if(localStorage.getItem("user") && Object.keys(user).length === 0) {
        setUser(JSON.parse(localStorage.getItem("user")));
    } else if(localStorage.getItem("user") === null && Object.keys(user).length !== 0) {
        setUser({});
    }

    return(
        <MyContext.Provider value={[isUserLoggedIn, user]}>
            {children}
        </MyContext.Provider>
    )
}

export default AppProvider;
