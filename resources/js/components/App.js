import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from "react-router-dom";
import Header from "./header.component";
import Main from "./main/main.component";
import 'fontsource-roboto';

function App() {
    return (
        <BrowserRouter>
            <Header/>
            <Route path={'/'} exact component={Main}/>
        </BrowserRouter>

    );
}

export default App;

if (document.getElementById('root')) {
    ReactDOM.render(<App/>, document.getElementById('root'));
}
