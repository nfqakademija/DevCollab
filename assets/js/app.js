import React from "react";
import { Route, Switch } from "react-router-dom";
import AppProvider from "./context";
import "../css/app.css";
import {
  HomePage,
  LoginPage,
  RegisterPage,
  UserHomepage,
  ProfilePage,
  ScoreboardPage
} from "./pages";
import { Layout } from "./components";

class App extends React.Component {
  constructor() {
    super();
    this.state = {
      isUserLoggedIn: localStorage.getItem("isLoggedIn")
    };

    this.handleSuccesfulAuth = this.handleSuccesfulAuth.bind(this);
  }

  handleSuccesfulAuth(data) {
    this.setState({
      isUserLoggedIn: true
    });
    // TODO -> store jwt token
    localStorage.setItem("isLoggedIn", true);
    localStorage.setItem("user", JSON.stringify(data));
  }

  render() {
    return (
      <AppProvider>
        <Layout isUserLoggedIn={this.state.isUserLoggedIn}>
          <Switch>
            {!this.state.isUserLoggedIn ? (
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
            />
          </Switch>
        </Layout>
      </AppProvider>
    );
  }
}

export default App;
