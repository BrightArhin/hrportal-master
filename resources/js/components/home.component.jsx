import React, {useEffect} from 'react';
import hrportal from "../api/hrportal";


const HomeComponent = (props) => {
    useEffect(() => {
        const fetch = async () => {
            const employees = await hrportal.get('/employees')
            console.log(employees.data);
        }

        fetch();
    })

   return (
        <div>
            <p>The new component</p>
        </div>

    )
};

export default HomeComponent;
