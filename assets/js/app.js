import React from 'react';
import { HomePage} from './pages'
import '../css/app.css';
import { Route, Switch } from 'react-router-dom';
import { Header } from './components';

const App = () => {

    return (
        <>
            <Header />
            <Switch >
                <Route exact path="/" component={HomePage} />
            </Switch >
        </>
    );
}

export default App;