import React, {useState, useEffect} from "react";
import {BrowserRouter, Route, Switch} from "react-router-dom";
import "../css/app.css";
import {
    HomePage,
    LoginPage,
    RegisterPage,
    LandingPage,
    ProfilePage,
    ScoreboardPage
} from "./pages";
import * as ROUTES from "./constants/routes";
import {AppProvider} from "./context";

const App = () => {
    const [user, setUser] = useState({});

    const getUser = () => {
        if (localStorage.getItem("user") && Object.keys(user).length === 0) {
            setUser(JSON.parse(localStorage.getItem("user")));
        } else if (
            localStorage.getItem("user") === null &&
            Object.keys(user).length !== 0
        ) {
            setUser({});
        }
    }

    useEffect(() => {
        getUser()
    }, [user])

    return (
        <AppProvider value={user}>
            <BrowserRouter>
                <Switch>
                    <Route exact path={ROUTES.LANDING} component={LandingPage}/>
                    <Route exact path={ROUTES.HOME} component={HomePage}/>
                    <Route exact path={ROUTES.LOGIN} component={LoginPage}/>
                    <Route exact path={ROUTES.REGISTER} component={RegisterPage}/>
                    <Route exact path={ROUTES.PROFILE} component={ProfilePage}/>
                    <Route exact path={ROUTES.SCOREBOARD} component={ScoreboardPage}/>
                </Switch>
            </BrowserRouter>
        </AppProvider>
    );
}

export default App;
