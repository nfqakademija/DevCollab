import React from 'react';
import { HomePage, LoginPage, RegisterPage, UserHomepage} from './pages'
import '../css/app.css';
import { Route, Switch } from 'react-router-dom';
import { Layout } from './components';
class App extends React.Component {
    constructor() {
        super();

        this.state = {
            isMenuOpen: false,
            isUserLoggedIn: false,
            user: {}
        }

        this.handleMenu = this.handleMenu.bind(this);
        this.handleSuccesfulAuth = this.handleSuccesfulAuth.bind(this);
    }

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

    render() {
        return(
            <Layout 
                isMenuOpen={this.state.isMenuOpen} 
                handleMenu={this.handleMenu} 
                isUserLoggedIn={this.state.isUserLoggedIn}>
                <Switch >
                    <Route 
                        exact 
                        path="/"
                        component={HomePage}
                        />
                    <Route 
                        exact 
                        path="/dashboard"
                        render={props => <UserHomepage 
                            {...props} 
                            isUserLoggedIn={this.state.isUserLoggedIn} 
                            user={this.state.user} />
                        }
                        />
                    <Route 
                        exact 
                        path="/login" 
                        component={LoginPage} 
                        />
                    <Route 
                        exact 
                        path="/register" 
                        render={props => <RegisterPage 
                            {...props} 
                            handleSuccesfulAuth={this.handleSuccesfulAuth}/>
                        }
                        />
                </Switch >
            </Layout>
        )
    }
};

export default App;
