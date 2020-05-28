import React from "react";
import ReactDOM from "react-dom";
import { useRoutes } from "./routes";
import { BrowserRouter as Router } from "react-router-dom";
import { NavBar } from "./components/NavBar";

function App() {
  const routes = useRoutes(true);

  return (
    <Router>
      <NavBar />
      {routes}
    </Router>
  );
}
ReactDOM.render(<App />, document.getElementById("root"));
