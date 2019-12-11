import React from "react";
import GithubIcon from "../../img/icons/github.png";

const CLASSES = {
  container: "w-full md:w-1/2 p-2",
  inner: "bg-white shadow-lg w-full h-full p-2 xl:p-4",
  title: "text-center text-4xl font-semibold mb-4",
  section: {
    halfSize: "w-full lg:w-1/2 px-2 my-2 h-auto",
    inner: "p-2 bg-gray-100 rounded-lg text-center h-full",
    title: "text-black text-xl font-semibold text-center"
  }
};

const { container, inner, title, section } = CLASSES;

const TableTeamRepository = ({ teamGithub, githubEvents }) => (
  <div className={container}>
    <div className={inner}>
      <h1 className={title}>Project repository</h1>
      <div className="px-2">
        <div className="flex flex-wrap -mx-2">
          <div className={section.halfSize}>
            <div className={section.inner}>
              <p className={section.title}>Repository</p>
              <a
                href={teamGithub.html_url}
                target="_blank"
                without
                rel="noopener noreferrer"
              >
                <img src={GithubIcon} alt="" className="mx-auto" />
              </a>
            </div>
          </div>
          <div className={section.halfSize}>
            <div className={section.inner}>
              <p className={section.title}>Open issues</p>
              {teamGithub.length === 0 && <p>Loading ...</p>}
              <p className="text-3xl font-semibold text-green-500">
                {teamGithub.open_issues}
              </p>
            </div>
          </div>
          <div className="w-full px-2 my-2 h-auto">
            <div className={section.inner}>
              <p className={section.title}>Last 10 events</p>
              {githubEvents.length === 0 && <p>Loading ...</p>}
              {githubEvents.slice(0, 10).map(event => (
                <p className="text-left" key={event.id}>
                  {event.type} by{" "}
                  <span className="font-semibold">
                    {event.actor.display_login}
                  </span>
                </p>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
);

export default TableTeamRepository;
