import React, { useContext } from 'react';
import axios from 'axios';
import { MyContext } from '../context';
import { LayoutUserDashboard } from '../components';

 
const ScoreboardPage = ({ history, location }) => {
    const [isUserLoggedIn, user] = useContext(MyContext);

    return (
        <LayoutUserDashboard location={location} history={history}>
            <h1>SCOREBOARD PAGE of {user.email}</h1>
        </LayoutUserDashboard>
    );
}

export default ScoreboardPage;
