import React, { Component } from "react";
import ReactDOM from "react-dom";
import { useRoutes } from "./routes";
import { BrowserRouter as Router } from "react-router-dom";
import { NavBar } from "./components/NavBar";
import { useAuth } from './hooks/auth.hook';
import { AuthContext } from './context/AuthContext';

export const App=()=> {
  const { token, login, logout, userId } = useAuth();
  const isAuthenticated = !!token;
  const routes = useRoutes(isAuthenticated);

  // console.log(token)
  return (
    <AuthContext.Provider
      value={{
        token,
        userId,
        login,
        logout,
        isAuthenticated,
      }}
    >
      <Router>
        <NavBar isAuth={isAuthenticated} />
        {routes}
      </Router>
    </AuthContext.Provider>
  );
}
ReactDOM.render(<App />, document.getElementById("root"));

