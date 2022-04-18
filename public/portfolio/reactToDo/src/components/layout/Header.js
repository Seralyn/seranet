import React from "react";

function Header() {
  return (
    <header style={headerStyle}>
      <h1>ToDo List</h1>
    </header>
  );
}

const headerStyle = {
  background: "rgb(57, 138, 230)",
  color: "white",
  textAlign: "center",
  padding: "10px",
};

export default Header;
