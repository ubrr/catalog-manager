import React from "react";
import { useRoutes } from "./routes";
import { BrowserRouter as Router } from "react-router-dom";
import { NavBar } from "./components/NavBar";

function App() {
  const routes = useRoutes(false);
  return (
    <Router>
      <NavBar />
      {routes}
    </Router>
  );
}

export default App;
