import React from "react";
import { Route, Switch } from "react-router-dom";
import { UserProvider } from "./context";
import "../css/app.css";
import {
  LandingPage,
  LoginPage,
  RegisterPage,
  HomePage,
  ProfilePage,
  ScoreboardPage
} from "./pages";
import { MainLayout } from "./components";
import * as ROUTES from "./constants/routes"

class App extends React.Component {
  constructor() {
    super();
    this.state = {
      isUserLoggedIn: localStorage.getItem("isLoggedIn"),
      user: {}
    };

    this.handleAuth = this.handleAuth.bind(this);
  }

  //TODO -> update once backend login/registration is working
  handleAuth(data) {
    this.setState({
      isUserLoggedIn: true,
      user: data
    });
    localStorage.setItem("isLoggedIn", true);
    localStorage.setItem("user", JSON.stringify(data));
  }

  render() {
    return (
      <UserProvider value={this.state.user}>
        <MainLayout isUserLoggedIn={this.state.isUserLoggedIn}>
          <Switch>
            <Route exact path={ROUTES.LANDING} component={LandingPage} />
            <Route exact path={ROUTES.HOME} component={HomePage} />
            <Route exact path={ROUTES.PROFILE} component={ProfilePage} />
            <Route exact path={ROUTES.SCOREBOARD} component={ScoreboardPage} />
            <Route exact path={ROUTES.LOGIN} render={props => (<LoginPage {...props} handleAuth={this.handleAuth}/>)}/>
            <Route exact path={ROUTES.REGISTER} render={props => <RegisterPage {...props} handleAuth={this.handleAuth}/>}/>
          </Switch>
        </MainLayout>
      </UserProvider>
    );
  }
}

export default App;
