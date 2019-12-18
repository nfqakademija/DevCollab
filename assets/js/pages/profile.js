import React, {useContext, useState} from "react";
import {DashboardLayout} from "../components";
import {UserContext} from "../context"
import axios from "axios";

const FormInput = ({inputLabel, name, field, handleChange}) => {

    const clearInput = e => {
        e.target.value = "";
        e.preventDefault();
    }

    return (
        <div className="mb-6">
            <label className="block text-gray-900 text-md mb-1" htmlFor={field}>
                {inputLabel}
            </label>
            <input
                className="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:shadow-xl"
                type="text"
                name={name}
                placeholder={field}
                onChange={handleChange}
                value={field !== null ? field : "Not Set"}
                onClick={clearInput}
            />
        </div>
    )
}

const ProfilePage = ({ handleAuth }) => {
    const user = useContext(UserContext);
    const [name, setName] = useState(user.name);
    const [lastname, setLastname] = useState(user.lastname);
    const [location, setLocation] = useState(user.location);
    const [githubUsername, setGithubUsername] = useState(user.github_username);
    const [shortDescription, setShortDescription] = useState(user.short_description);
    const [errors, setErrors] = useState(false)
    const [success, setSuccess] = useState(false);


    const handleChange = e => {
        switch (e.target.name) {
            case "name":
                setName(e.target.value);
                break;
            case "lastname":
                setLastname(e.target.value);
                break;
            case "location":
                setLocation(e.target.value);
                break;
            case "githubUsername":
                setGithubUsername(e.target.value)
                break;
            case "shortDescription":
                setShortDescription(e.target.value)
                break;
            default:
                break;
        }
        e.preventDefault();
    }

    const handleSubmit = e => {
        const UserJson = {
            "name": name,
            "lastname": lastname,
            "location": location,
            "github_username": githubUsername,
            "short_description": shortDescription,
            "username": user.username
        }

        axios.post("/api/profile", UserJson)
            .then(res => {
                localStorage.setItem("user", JSON.stringify(res.data));
                setSuccess(true);
                setErrors(false);
                handleAuth(res.data);
                console.log(res.data);
            })
            .catch(error => {
                console.log(error);
                setErrors(true);
                setSuccess(false)
            });

        e.preventDefault();
    }

    return (
        <DashboardLayout>
            <div className="w-full p-2">
                <div className="bg-white shadow-lg w-full lg:w-1/2 p-2 xl:p-4">
                    <h1 className="text-center text-4xl font-semibold mb-4">Profile</h1>
                    <form className="w-full max-w-xs md:max-w-md mx-auto">
                        <FormInput inputLabel="Name" name="name" field={name} handleChange={handleChange}/>
                        <FormInput inputLabel="Surname" name="lastname" field={lastname} handleChange={handleChange}/>
                        <FormInput inputLabel="Location" name="location" field={location} handleChange={handleChange}/>
                        <FormInput inputLabel="Github Username" name="githubUsername" field={githubUsername} handleChange={handleChange}/>
                        <FormInput inputLabel="Short description about you" name="shortDescription" field={shortDescription} handleChange={handleChange}/>
                        {/*<FormInput inputLabel="Skills" field={} handleChange={handleChange}/>*/}
                        {errors && <p className="text-xs text-red-500 mb-4">There was an error. Try again.</p>}
                        {success && <p className="text-xs text-green-500 mb-4">Profile updated!</p>}
                        <button
                            type="submit"
                            onClick={handleSubmit}
                            className="inline-block text-md lg:text-lg font-semibold bg-teal-500 rounded px-4 py-2 text-white my-2 mr-2 hover:bg-teal-600 util-shadow-green"
                        >
                            Update Profile
                        </button>
                    </form>
                </div>
            </div>
        </DashboardLayout>
    );
};

export default ProfilePage;
