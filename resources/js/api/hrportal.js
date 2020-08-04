import axios from  'axios';


const hrportal = axios.create({
    baseURL : 'api/admin'
})

export default hrportal;



