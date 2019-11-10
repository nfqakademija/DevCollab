import React from 'react';
import { 
    HomePage, 
    LoginPage, 
    RegisterPage, 
    UserHomepage, 
    ProfilePage, 
    ScoreboardPage } from './pages'
import '../css/app.css';
import { Route, Switch } from 'react-router-dom';
import { Layout } from './components';
class App extends React.Component {
    constructor() {
        super();

        this.state = {
            isMenuOpen: false,
            isUserLoggedIn: true,
            user: {email: "demo@mail.com", name: "Jonas"}
        }

        this.handleMenu = this.handleMenu.bind(this);
        this.handleSuccesfulAuth = this.handleSuccesfulAuth.bind(this);
        this.handleLogout = this.handleLogout.bind(this);
    }

    //TODO
    // Check if user is looged in or not

    handleMenu() {
        this.setState({
            isMenuOpen: !this.state.isMenuOpen
        })
    }

    handleSuccesfulAuth(data) {
        this.setState({
            isUserLoggedIn: !this.state.isUserLoggedIn,
            user: data
        })
    }

    handleLogout() {
        this.setState({
            isUserLoggedIn: !this.state.isUserLoggedIn
        })
    }

    render() {
        return(
            <Layout 
                isMenuOpen={this.state.isMenuOpen} 
                handleMenu={this.handleMenu} 
                isUserLoggedIn={this.state.isUserLoggedIn}>
                <Switch >
                    {!this.state.isUserLoggedIn ? (
                    <Route 
                        exact 
                        path="/"
                        component={HomePage}
                        />) : (
                        <Route 
                        exact 
                        path="/"
                        render={props => <UserHomepage 
                            {...props} 
                            isUserLoggedIn={this.state.isUserLoggedIn} 
                            user={this.state.user}
                            handleLogout={this.handleLogout} />
                        }
                    />)}
                    <Route 
                        exact 
                        path="/login" 
                        render={props => <LoginPage 
                            {...props} 
                            handleSuccesfulAuth={this.handleSuccesfulAuth} />
                        }
                    />
                    <Route 
                        exact 
                        path="/register" 
                        render={props => <RegisterPage 
                            {...props} 
                            handleSuccesfulAuth={this.handleSuccesfulAuth}/>
                        }
                    />
                    <Route 
                        exact 
                        path="/profile" 
                        render={props => <ProfilePage 
                            {...props} 
                            user={this.state.user}
                            handleLogout={this.handleLogout}/>
                        }
                    />
                    <Route 
                        exact 
                        path="/scoreboard" 
                        render={props => <ScoreboardPage 
                            {...props} 
                            user={this.state.user}
                            handleLogout={this.handleLogout}/>
                        }
                    />
                </Switch >
            </Layout>
        )
    }
};

export default App;
