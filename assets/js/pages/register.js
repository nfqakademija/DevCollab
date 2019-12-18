import React, { useState } from "react";
import { withRouter, Link } from "react-router-dom";
import axios from "axios";
import * as ROUTES from "../constants/routes"
import { Particles } from "../components";

const CLASSES = {
  main:
    "poppins container h-auto w-full mx-auto flex justify-center items-start xl:items-center mt-4 xl:mt-24 pb-8",
  container: "w-full max-w-xs md:max-w-md md:z-10",
  form: {
    wrapper: "bg-white shadow-lg rounded px-8 py-10 mb-2",
    divider: "mb-6",
    label: "block text-gray-900 text-md font-semibold mb-2",
    input:
      "shadow-md appearance-none border-1 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:shadow-xl",
    button:
      "bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow-md hover:shadow-xl",
    error: "text-xs text-red-500 mb-4"
  },
  loginLink:
    "ml-1 mr-16 inline-block align-baseline font-bold text-md text-teal-500 hover:text-teal-600"
};

const { main, container, form, loginLink } = CLASSES;

const RegisterPage = ({ history, handleAuth }) => {
  const [username, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [passwordConfirmation, setPasswordConfirmation] = useState("");
  const [errors, setErrors] = useState("");

  const handleChange = e => {
    switch (e.target.name) {
      case "username":
        setUsername(e.target.value);
        break;
      case "email":
        setEmail(e.target.value);
        break;
      case "password":
        setPassword(e.target.value);
        break;
      case "passwordConfirmation":
        setPasswordConfirmation(e.target.value);
        break;
    }
  };

  const handleSubmit = e => {
    e.preventDefault();
    axios
      .post(
        "security/registration",
        {
          username,
          email,
          password,
          passwordConfirmation
        },
        { withCredentials: true }
      )
      .then(res => {
        if (res.status === 201) {
          handleAuth(res.data);
          localStorage.setItem("isLoggedIn", true);
          localStorage.setItem("user", JSON.stringify(res.data));
<<<<<<< HEAD
          // alert("Registration successful, Login now");
          history.push(ROUTES.HOME);
=======
          history.push(ROUTES.HOME);
          window.location.reload(true);
>>>>>>> 4c3567ba60bcf0f76a29a8e9bc0503558565e23d
        } else {
          const errors = res.data;
          setErrors(errors);
        }
      })
      .catch(err => {
        console.log(err);
      });
  };
  return (
    <div className={main}>
      <div className={container} style={{ zIndex: 2 }}>
        <form className={form.wrapper} onSubmit={handleSubmit}>
          <div className={form.divider}>
            <label className={form.label} htmlFor="username">
              Username
            </label>
            <input
              className={form.input}
              type="text"
              name="username"
              placeholder="Username"
              onChange={handleChange}
              value={username}
            />
          </div>
          <div className={form.divider}>
            <label className={form.label} htmlFor="email">
              Email
            </label>
            <input
              className={form.input}
              type="email"
              name="email"
              placeholder="Email"
              onChange={handleChange}
              value={email}
            />
          </div>
          <div className={form.divider}>
            <label className={form.label} htmlFor="password">
              Password
            </label>
            <input
              className={form.input}
              type="password"
              name="password"
              placeholder="******************"
              onChange={handleChange}
              value={password}
            />
          </div>
          <div className={form.divider}>
            <label className={form.label} htmlFor="passwordConfirmation">
              Re-enter password
            </label>
            <input
              className={form.input}
              type="password"
              name="passwordConfirmation"
              placeholder="******************"
              onChange={handleChange}
              value={passwordConfirmation}
            />
          </div>
          {errors !== "" ? <p className={form.error}>{errors}</p> : null}
          <div className="flex items-center justify-between">
            <button className={form.button} type="submit">
              Register
            </button>
          </div>
        </form>
        <div className="relative z-10 px-4">
          <p>
            Already have an account?
            <Link className={loginLink} to="/login">
              Login here
            </Link>
          </p>
        </div>
      </div>
      <Particles />
    </div>
  );
};

export default withRouter(RegisterPage);
