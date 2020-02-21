import React from "react";
import Setting from './Settings'
const Admin = ({wpObject}) => {
  return (
    <div className="wrap">
      <h1>React Setting</h1>
      <Setting wpObject={wpObject} />
    </div>
  );
};
export default Admin;
