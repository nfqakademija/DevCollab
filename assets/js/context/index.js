import React from "react";

export const UserContext = React.createContext();

export const UserProvider = UserContext.Provider
export const UserConsumer = UserContext.Consumer
export default UserContext

// TODO -> update once backend is working
// const AppProvider = ({ children }) => {
//   const [isUserLoggedIn, setIsUserLoggedIn] = useState(
//     localStorage.getItem("isLoggedIn")
//   );
//   const [user, setUser] = useState({});

//   if (localStorage.getItem("user") && Object.keys(user).length === 0) {
//     setUser(JSON.parse(localStorage.getItem("user")));
//   } else if (
//     localStorage.getItem("user") === null &&
//     Object.keys(user).length !== 0
//   ) {
//     setUser({});
//     setIsUserLoggedIn(false);
//   }

//   return (
//     <MyContext.Provider value={[isUserLoggedIn, user]}>
//       {children}
//     </MyContext.Provider>
//   );
// };

// export default AppProvider;
