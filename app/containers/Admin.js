import React from 'react'
import BasicForm from '../components/basicForm'
const Admin = (props) => (
  <div className="wrap">
      <h1>React Setting</h1>
      <BasicForm wpObject={props.wpObject} />
  </div>
)
export default Admin