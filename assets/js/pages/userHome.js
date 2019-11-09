import React from 'react';

const UserHomepage = ({ isUserLoggedIn, user }) => (
    <div>
        <h1>User logged in status: {isUserLoggedIn ? "SIGNED IN" : "NOT SIGNED IN"}</h1>
        <h1>User is logged as <strong>{user.username}</strong></h1>
    </div>
);

export default UserHomepage;
