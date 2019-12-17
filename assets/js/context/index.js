import React, { useState } from "react";

export const MyContext = React.createContext();

export const AppProvider = MyContext.Provider
export const AppConsumer = MyContext.Consumer
export default MyContext

// TODO -> update once backend is working
// const AppProvider = ({ children }) => {
//   const [isUserLoggedIn, setIsUserLoggedIn] = useState(
//     localStorage.getItem("isLoggedIn")
//   );
//   const [user, setUser] = useState({});
//
//   if (localStorage.getItem("user") && Object.keys(user).length === 0) {
//     setUser(JSON.parse(localStorage.getItem("user")));
//   } else if (
//     localStorage.getItem("user") === null &&
//     Object.keys(user).length !== 0
//   ) {
//     setUser({});
//     setIsUserLoggedIn(false);
//   }
//
//   return (
//     <MyContext.Provider>
//       {children}
//     </MyContext.Provider>
//   );
// };
//
// export default AppProvider;
