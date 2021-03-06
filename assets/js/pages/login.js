import React, { useState } from "react";
import { withRouter, Link } from "react-router-dom";
import { Particles } from "../components";
import axios from "axios";

const LoginPage = ({ history, handleAuth }) => {
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
      .post("security/login", userJson)
      .then(res => {
        if (res.status === 200 && res.statusText === "OK") {
          handleAuth(res.data);
          history.push("/home");
          window.location.reload(true);
        }
      })
      .catch(err => {
        setErrors("There was a problem with login details. Try again");
        console.log(err);
      });
  };

  return (
    <div className="poppins container h-auto w-full mx-auto flex justify-center items-center mt-4 md:mt-24">
      <div className="w-full max-w-xs md:max-w-md md:z-10" style={{ zIndex: 2 }}>
        <form className="bg-white shadow-lg rounded px-8 py-10 mb-2">
          <div className="mb-6">
            <label className="block text-gray-900 text-md font-semibold mb-2" htmlFor="email">
              Email
            </label>
            <input
              className="shadow-md appearance-none border-1 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:shadow-xl"
              type="email"
              name="email"
              placeholder="email"
              onChange={handleChange}
              value={email}
            />
          </div>
          <div className="mb-6">
            <label className="block text-gray-900 text-md font-semibold mb-2" htmlFor="password">
              Password
            </label>
            <input
              className="shadow-md appearance-none border-1 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:shadow-xl"
              type="password"
              name="password"
              placeholder="******************"
              onChange={handleChange}
              value={password}
            />
          </div>
          {errors !== "" ? <p className="text-xs text-red-500 mb-4">{errors}</p> : null}
          <div className="flex items-center justify-between">
            <button
              className="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow-md hover:shadow-xl"
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

export default withRouter(LoginPage);
