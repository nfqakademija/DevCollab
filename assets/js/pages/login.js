import React, { useState } from "react";
import { Link } from "react-router-dom";
import { Particles } from "../components";
import axios from "axios";

const CLASSES = {
  main:
    "poppins container h-auto w-full mx-auto flex justify-center items-center mt-4 md:mt-24",
  container: "w-full max-w-xs md:max-w-md md:z-10",
  form: {
    wrapper: "bg-white shadow-lg rounded px-8 py-10 mb-2",
    divider: "mb-6",
    label: "block text-gray-900 text-md font-semibold mb-2",
    input:
      "shadow-md appearance-none border-1 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:shadow-xl",
    button:
      "bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow-md hover:shadow-xl",
    error: "text-xs text-red-500 mb-4",
    forgotPasswordLink:
      "inline-block align-baseline font-bold text-md text-gray-600 hover:text-gray-700"
  }
};

const { main, container, form } = CLASSES;

const LoginPage = ({ history, handleSuccesfulAuth }) => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [errors, setErrors] = useState("");

  const handleChange = e => {
    switch (e.target.name) {
      case "email":
        setEmail(e.target.value);
        break;
      case "password":
        setPassword(e.target.value);
        break;
      default:
        break;
    }
  };

  const handleSubmit = e => {
    e.preventDefault();

    let userJson = {
      security: {
        credentials: {
          email: email,
          password: password
        }
      }
    };

    axios
      .post("user/login", userJson)
      .then(res => {
        if (res.status === 200 && res.statusText === "OK") {
          handleSuccesfulAuth(res.data);
          history.push("/");
        }
      })
      .catch(err => {
        setErrors("There was a problem with login details. Try again");
        console.err(err);
      });
  };

  return (
    <div className={main}>
      <div className={container} style={{ zIndex: 2 }}>
        <form className={form.wrapper}>
          <div className={form.divider}>
            <label className={form.label} htmlFor="email">
              Email
            </label>
            <input
              className={form.input}
              type="email"
              name="email"
              placeholder="email"
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
          {errors !== "" ? <p className={form.error}>{errors}</p> : null}
          <div className="flex items-center justify-between">
            <button
              className={form.button}
              type="submit"
              onClick={handleSubmit}
            >
              Sign In
            </button>
          </div>
        </form>
        <div className="flex justify-between relative z-10 px-4">
          <p>
            Don`t have an account?
            <Link
              className="ml-1 mr-16 inline-block align-baseline font-bold text-md text-teal-500 hover:text-teal-600"
              to="/register"
            >
              Register here
            </Link>
          </p>
        </div>
      </div>
      <Particles />
    </div>
  );
};

export default LoginPage;
