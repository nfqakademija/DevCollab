import React from "react";
import { Route, Switch } from "react-router-dom";
import { AppProvider } from "./context";
import "../css/app.css";
import {
  LandingPage,
  LoginPage,
  RegisterPage,
  HomePage,
  ProfilePage,
  ScoreboardPage
} from "./pages";
import { Layout } from "./components";
import * as ROUTES from "./constants/routes"

class App extends React.Component {
  constructor() {
    super();
    this.state = {
      isUserLoggedIn: localStorage.getItem("isLoggedIn"),
      user: {}
    };

    this.handleSuccesfulAuth = this.handleSuccesfulAuth.bind(this);
  }

  //TODO -> update once backend login/registration is working
  handleSuccesfulAuth(data) {
    this.setState({
      isUserLoggedIn: true,
      user: data
    });
    localStorage.setItem("isLoggedIn", true);
    localStorage.setItem("user", JSON.stringify(data));
  }

  render() {
    return (
      <AppProvider value={user}>
        <Layout isUserLoggedIn={this.state.isUserLoggedIn}>
          <Switch>
            <Route exact path={ROUTES.LANDING} component={LandingPage} />
            <Route exact path={ROUTES.HOME} component={HomePage} />
            <Route exact path={ROUTES.LOGIN} component={LoginPage} />
            <Route exact path={ROUTES.REGISTER} component={RegisterPage} />
            <Route exact path={ROUTES.PROFILE} component={ProfilePage} />
            <Route exact path={ROUTES.SCOREBOARD} component={ScoreboardPage} />



            {/* {!this.state.isUserLoggedIn ? (
              <Route exact path="/" component={HomePage} />
            ) : (
              <Route
                exact
                path="/"
                render={props => <UserHomepage {...props} />}
              />
            )}
            <Route
              exact
              path="/login"
              render={props => (
                <LoginPage
                  {...props}
                  handleSuccesfulAuth={this.handleSuccesfulAuth}
                />
              )}
            />
            <Route
              exact
              path="/register"
              render={props => (
                <RegisterPage
                  {...props}
                  handleSuccesfulAuth={this.handleSuccesfulAuth}
                />
              )}
            />
            <Route
              exact
              path="/profile"
              render={props => <ProfilePage {...props} />}
            />
            <Route
              exact
              path="/scoreboard"
              render={props => <ScoreboardPage {...props} />}
            /> */}
          </Switch>
        </Layout>
      </AppProvider>
    );
  }
}

export default App;
