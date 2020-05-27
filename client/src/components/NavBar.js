import React from "react";

import {
    Box,
    Link,
    Flex,
    Text
  } from 'rebass'
//   6D435A
// 52164c
export const NavBar = () => {
  return (

    <Flex px={4} color="white" bg="#410D3B" alignItems="center">
      <Text  fontWeight="bold">
        <h2>RefPoint</h2>
      </Text>
      <Box mx="auto" />
      <Link variant="nav" color="white" href="#!">
        Profile
      </Link>
    </Flex>
  );
};
