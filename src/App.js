import logo from './logo.svg';

import './App.css';
import { useState } from 'react';
import  axios  from 'axios';


function App() {

  const [img, setImage] = useState([])


  const handleimg = (e)=>{
    setImage(e.target.files[0]);
    console.log(img);
  }

  const submit = (e)=>{
    e.preventDefault();


    var formdata = new FormData();
    formdata.append('image',img);

    axios.post('/api/store',formdata).then((res)=>{
      if(res.data.status===200){
         alert(res.data.message);
      }else if(res.data.status===422){
        alert(res.data.errors);
      }
    })
  }



  return (
    <div className="App">
    <form onSubmit={submit} encType="multipart/form-data ">

       <input type="file" name="image" onChange={handleimg}/>
       <button>click</button>
    </form>
    </div>
  );
}

export default App;
