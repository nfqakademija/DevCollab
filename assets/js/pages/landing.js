import React from "react";
import {Link} from "react-router-dom";
import { Header } from "../components"
import HeroImg from "../../img/hero.png";
import HIW1Img from "../../img/hiw1.png";
import HIW2Img from "../../img/hiw2.png";
import HIW3Img from "../../img/hiw3.png";
import HIW4Img from "../../img/hiw4.png";

const CLASSES = {
    main: "poppins w-full",
    hero: {
        section:
            "container mx-auto flex flex-col lg:flex-row items-center mt-10 mb-8  px-2 xl:px-0",
        content: "hero-content w-full lg:w-2/5 text-center lg:text-left",
        title:
            "text-5xl xl:text-6xl font-bold tracking-tight leading-tight mb-2 lg:mb-4",
        subtitle: "text-md lg:text-xl mb-8 md:px-16 lg:px-0",
        btn:
            "inline-block text-md lg:text-lg font-semibold bg-teal-500 rounded px-4 py-2 text-white my-2 mr-2 hover:bg-teal-600 util-shadow-green",
        img: "w-full lg:w-3/5 h-auto"
    },
    hiw: {
        section: "w-full util-landing-bg-gradient pt-8 lg:pt-16 pb-8 relative",
        title: "text-center text-5xl font-bold tracking-tight mb-4 lg:mb-24",
        rowContainer: "flex w-full flex-col lg:flex-row mb-8 xl:mb-32 relative",
        imageLeft:
            "px-2 lg:px-0 hiw-image-bg hiw-rounded-r -ml-2 lg:ml-0 flex justify-center lg:justify-end items-center",
        imageRight:
            "px-2 lg:px-0 hiw-image-bg hiw-rounded-l -ml-2 lg:ml-0 flex justify-center lg:justify-start items-center",
        content: "w-full mx-auto",
        contentRight:
            "order-1 lg:order-2 w-full flex flex-col justify-center mb-8 px-2 lg:px-8 xl:px-64 sm:mb-12",
        contentLeft:
            "w-full flex flex-col justify-center mb-8 px-2 lg:px-8 xl:px-64 sm:mb-12",
        contentTitle:
            "text-3xl font-semibold text-center lg:text-left text-gray-900",
        contentLead: "text-lg font-medium text-gray-800"
    }
};

const {main, hero, hiw} = CLASSES;

const LandingPage = () => {
    const bubbles = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    return (
        <div className="min-h-screen flex flex-col justify-between relative">
            <Header />
            <main className={main}>
                <section className={hero.section}>
                    <div className={hero.content}>
                        <h1 className={hero.title}>Let`s build teamwork skills together</h1>
                        <p className={hero.subtitle}>
                            Coding skills are just part of what makes developer great. Let’s
                            work on the other part together.
                        </p>
                        <div>
                            <a className={hero.btn} href="#about">
                                How it works
                            </a>
                            <Link to="/register" className={hero.btn} href="#">
                                Join the challenge
                            </Link>
                        </div>
                    </div>
                    <div className={hero.img}>
                        <img alt={""} src={HeroImg}/>
                    </div>
                </section>
                <section className={hiw.section} id="about">
                    {bubbles.map(id => (
                        <span
                            key={`bubble-green${id}`}
                            className={`bubble bubble-green bubble-green-${id}`}
                        />
                    ))}
                    {bubbles.map(id => (
                        <span
                            key={`bubble-blue${id}`}
                            className={`bubble bubble-blue bubble-blue-${id}`}
                        />
                    ))}
                    {bubbles.map(id => (
                        <span
                            key={`bubble-yellow${id}`}
                            className={`bubble bubble-yellow bubble-yellow-${id}`}
                        />
                    ))}
                    <h2 className={hiw.title}>How it works</h2>
                    <div className={hiw.rowContainer}>
                        <div className="w-full order-2 lg:order-1">
                            <div className={hiw.imageLeft}>
                                <img src={HIW1Img} alt="" className="xl:-mr-8"/>
                            </div>
                        </div>
                        <div className={hiw.contentRight}>
                            <div className={hiw.content}>
                                <h3 className={hiw.contentTitle}>It starts with you</h3>
                                <p className={hiw.contentLead}>
                                    Once we’ve got information about you, our insanely smart AI will
                                    start cheking for other people you can team up with
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className={hiw.rowContainer}>
                        <div className={hiw.contentLeft}>
                            <div className={hiw.content}>
                                <h3 className={hiw.contentTitle}>Team has been built</h3>
                                <p className={hiw.contentLead}>
                                    After team building will be finished, you will get all the
                                    details to contact your teammates. Soon project details will be
                                    sent to all of you!
                                </p>
                            </div>
                        </div>
                        <div className="w-full">
                            <div className={hiw.imageRight}>
                                <img src={HIW2Img} alt="" className="xl:-ml-8"/>
                            </div>
                        </div>
                    </div>
                    <div className={hiw.rowContainer}>
                        <div className="w-full order-2 lg:order-1">
                            <div className={hiw.imageLeft}>
                                <img src={HIW3Img} alt="" className="xl:-mr-8"/>
                            </div>
                        </div>
                        <div className={hiw.contentRight}>
                            <div className={hiw.content}>
                                <h3 className={hiw.contentTitle}>Working together</h3>
                                <p className={hiw.contentLead}>
                                    Your team will receive details about project and it will be up
                                    to all of you on how to make it real.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className={hiw.rowContainer}>
                        <div className={hiw.contentLeft}>
                            <div className={hiw.content}>
                                <h3 className={hiw.contentTitle}>Competing against others</h3>
                                <p className={hiw.contentLead}>
                                    All teams will be making same project, but it will be up to them
                                    on how to make it. Our senior developers will be reviewing and
                                    scoring teams on code quality, complexity and other markers.
                                </p>
                            </div>
                        </div>
                        <div className="w-full">
                            <div className={hiw.imageRight}>
                                <img src={HIW4Img} alt="" className="xl:-ml-8"/>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    );
};

export default LandingPage;
