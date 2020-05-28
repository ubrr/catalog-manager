import React, { useState,useContext } from "react";
import { useHttp } from "../hooks/http.hook";
import { AuthContext } from "../context/AuthContext";
import { AuthCard } from "../components/AuthCard";
import { Box } from "rebass";

export const AuthPage = () => {
  const auth = useContext(AuthContext);
  const { request } = useHttp();
  const [form, setForm] = useState({
    email: "",
    password: "",
  });

  const changeHandler = (event) => {
    setForm({ ...form, [event.target.name]: event.target.value });
  };

  const registerHandler = async () => {
    try {
      const data = await request("/api/auth/register", "POST", { ...form });
      // console.log("data=", data.data);
    } catch (error) {}
  };
  const loginHandler = async () => {
    try {
      const data = await request("/api/auth/login", "POST", { ...form });
      console.log("data=", data);
      auth.login(data.token, data.userId,form.email);
    } catch (error) {}
  };

  return (
    <Box
      sx={{
        py: 3,
        maxWidth: "100%",
        mx: "auto",
        px: 3,
      }}
    >
      <AuthCard changeHandler={changeHandler} loginHandler={loginHandler} registerHandler={registerHandler}/>
    </Box>
  );
};
