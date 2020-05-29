import React from "react";
import { useHistory } from "react-router-dom";
import { useContext } from "react";
import { AuthContext } from "../context/AuthContext";
import { Box, Link, Flex, Text } from "rebass";
import { NavLink } from "react-router-dom";
//   6D435A
// 52164c
export const NavBar = (props) => {
  const history = useHistory();
  const auth = useContext(AuthContext);

  const logoutHandler = (event) => {
    event.preventDefault();
    auth.logout();
    history.push("/");
  };
  let component = [];
  if (props.isAuth) {
    component.push(
      <NavLink style={{ color: "white" }} key="1" to="/profile">
        Profile
      </NavLink>
    );
    component.push(
      <NavLink
        key="2"
        style={{ marginLeft: 10, color: "white" }}
        onClick={logoutHandler}
        to="/"
      >
        Выйти
      </NavLink>
    );
  }
  return (
    <Flex px={4} color="white" bg="#410D3B" alignItems="center">
      <Text fontWeight="bold">
        <h2>RefPoint</h2>
      </Text>
      <Box mx="auto" />

      {component}
    </Flex>
  );
};
