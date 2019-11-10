import React from 'react';
import { LayoutUserDashboard } from '../components';
 
const ScoreboardPage = ({ location, user, handleLogout }) => (
    <LayoutUserDashboard handleLogout={handleLogout} location={location}>
        <h1>SCOREBOARD PAGE of {user.email}</h1>
    </LayoutUserDashboard>
);

export default ScoreboardPage;
