import React from "react";

import { Button, Card, Box, Text } from "rebass";
import { Label, Input } from "@rebass/forms";

export const AuthCard = ({ loginHandler, changeHandler, registerHandler }) => {
  return (
    <Box>
      <Card
        sx={{
          p: 1,
          borderRadius: 2,
          boxShadow: "0 0 16px rgba(0, 0, 0, .25)",
          maxWidth: "50%",
          mx: "auto",
        }}
      >
        <Box px={2}>
          <Text textAlign="center">
            <h2>Войдите в систему</h2>
          </Text>
          <Box px={3}>
            <Label htmlFor="email">Email</Label>
            <Input
              id="email"
              name="email"
              type="email"
              autoComplete="off"
              placeholder="mail@example.com"
              onChange={changeHandler}
            />
            <Label htmlFor="email" mt={2}>
              Password
            </Label>
            <Input
              id="password"
              name="password"
              type="password"
              placeholder="password"
              onChange={changeHandler}
            />
          </Box>

          <Box textAlign="center" my={3}>
            <Button
              textAlign="center"
              color="white"
              backgroundColor="#357C98"
              mr={2}
              onClick={loginHandler}
            >
              Войти
            </Button>
            <Button
              color="white"
              backgroundColor="#1F7730"
              mr={2}
              mt={1}
              onClick={registerHandler}
            >
              Зарегестрироваться
            </Button>
          </Box>
        </Box>
      </Card>
    </Box>
  );
};
