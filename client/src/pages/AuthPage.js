import React, { useState } from "react";
import { useHttp } from "../hooks/http.hook";

export const AuthPage = () => {
  const { request } = useHttp();
  const [form, setForm] = useState({
    email: "",
    password: "",
  });

  const changeHandler = (event) => {
    setForm({ ...form, [event.target.name]: event.target.value });
    
  };

  const registerHandler = async (event) => {
    event.preventDefault()
    try {
      const data = await request("/api/auth/register", "POST", { ...form });
      console.log('data=',data);
    } catch (error) {}
  };

  return (
    <div>
      <form style={{ paddingTop: "30px", margin: "auto", width: "200px" }}>
        <label>
          Email:
          <input
            style={{ paddingLeft: "10px" }}
            type="text"
            name="email"
            onChange={changeHandler}
          />
        </label>

        <label>
          Пароль:
          <input
            style={{ paddingLeft: "10px" }}
            name="password"
            type="password"
            onChange={changeHandler}
          />
        </label>
        <input
          style={{ marginTop: "10px" }}
          type="submit"
          value="Отправить"
          onClick={registerHandler}
        />
      </form>
    </div>
  );
};
