import React, { useState } from 'react';
import { HomePage} from './pages'
import '../css/app.css';
import { Route, Switch } from 'react-router-dom';
import { Header } from './components';

const App = () => {
    const [isMenuOpen, setIsMenuOpen] = useState(false)

    const handleMenu = () => {
        setIsMenuOpen(!isMenuOpen);
    }

    return(
        <>
            <Header handleMenu={handleMenu} isMenuOpen={isMenuOpen}/>
            <Switch >
                <Route exact path="/" component={HomePage} />
            </Switch >
        </>
    )
};

export default App;