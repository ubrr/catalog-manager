import React, { useState } from "react";
import { useHttp } from "../hooks/http.hook";
import { useMessage } from "../hooks/message.hook";
import { AuthCard } from "../components/AuthCard";
import { Box } from "rebass";

export const AuthPage = () => {

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
      console.log("data=", data.message);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    } catch (error) {}
  };
  const loginHandler = async () => {
    console.log("loginHANDLER")
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
