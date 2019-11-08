import React, { useState } from 'react';
import { HomePage, LoginPage, RegisterPage, UserHomepage} from './pages'
import '../css/app.css';
import { Route, Switch } from 'react-router-dom';
import { Layout } from './components';

const App = () => {
    const [isMenuOpen, setIsMenuOpen] = useState(false);
    const [isUserLoggedIn, setIsUserLoggedIn] = useState(false);

    const handleMenu = () => {
        setIsMenuOpen(!isMenuOpen);
    }

    const handleUserLogin = () => {
       setIsUserLoggedIn(!isUserLoggedIn);
       console.log(isUserLoggedIn);
    }


    return(
        <Layout isMenuOpen={isMenuOpen} handleMenu={handleMenu} isUserLoggedIn={isUserLoggedIn}>
            <Switch >
                <Route exact path="/" component={isUserLoggedIn ? UserHomepage: HomePage} />
                <Route exact path="/login" component={LoginPage} handleUserLogin={handleUserLogin} />
                <Route exact path="/register" component={RegisterPage} />
            </Switch >
        </Layout>
    )
};

export default App;
