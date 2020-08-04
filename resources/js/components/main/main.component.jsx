import React from 'react';
import {Button} from '@material-ui/core'
import './main.styles.css'

const Main = (props) => (
    <div className={'container'}>
        <p>This is my test component</p>
        <Button variant={'contained'} color={'primary'}>Hello World</Button>
    </div>
);

export default Main;
