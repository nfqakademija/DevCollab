import React from 'react';
import HeroImg from '../../img/hero.png';
import HIW1Img from '../../img/hiw1.png';
import HIW2Img from '../../img/hiw2.png';
import HIW3Img from '../../img/hiw3.png';
import HIW4Img from '../../img/hiw4.png';


const CLASSES = {
    main: "poppins w-full",
    hero: {
        section: "container mx-auto flex flex-col lg:flex-row items-center mt-10 mb-8  px-2 xl:px-0",
        content: "hero-content w-full lg:w-2/5 text-center lg:text-left",
        title: "text-5xl xl:text-6xl font-bold tracking-tight leading-tight mb-2 lg:mb-4",
        subtitle: "text-md lg:text-xl mb-8 md:px-16 lg:px-0",
        btn: "inline-block text-md lg:text-lg font-semibold bg-teal-500 rounded px-4 py-2 text-white my-2 mr-2 hover:bg-teal-600 cs-shadow-green",
        img: "w-full lg:w-3/5 h-auto"
    },
}

const HomePage = () => {
    return(
        <main className={CLASSES.main}>
            {/* HERO SECTION */}
            <section className={CLASSES.hero.section}>
                <div className={CLASSES.hero.content}>
                    <h1 className={CLASSES.hero.title}>
                        Let's build teamwork skills together
                    </h1>
                    <p className={CLASSES.hero.subtitle}>
                        Coding skills are just part of what makes developer great. Let’s
                        work on the other part together.
                    </p>
                    <div>
                        <a className={CLASSES.hero.btn} href="#about">How it works</a>
                        <a className={CLASSES.hero.btn}>Join the challenge</a>
                    </div>
                </div>
                <div className={CLASSES.hero.img}>
                <img src={HeroImg} />
                </div>
            </section>

            {/* HOW IT WORKS SECTION */}
            <section className="w-full landing-bg-gradient pt-8 lg:pt-16 pb-8" id="about">
                <h2 className="text-center text-5xl font-bold tracking-tight mb-4 lg:mb-24">How it works</h2>

                {/* IT STARTS WITH YOU */}
                <div className="flex w-full flex-col lg:flex-row mb-8 xl:mb-32">
                    <div className="w-full order-2 lg:order-1">
                        <div className="px-2 lg:px-0 hiw-image-bg hiw-rounded-r -ml-2 lg:ml-0 flex justify-center lg:justify-end items-center">
                            <img src={HIW1Img} alt="" className="xl:-mr-8"/>
                        </div>
                    </div>
                    <div className="order-1 lg:order-2 w-full flex flex-col justify-center mb-4 px-2 lg:px-8 xl:px-64 sm:mb-12">
                        <div className="w-full mx-auto">
                            <h3 className="text-3xl font-semibold text-center lg:text-left text-gray-900">It starts with you</h3>
                            <p className="text-lg font-medium text-gray-800">Once we’ve got information about you, our insanely smart AI will start cheking for other people you can team up with</p>
                        </div>
                    </div>
                </div>

                {/* TEAM HAS BEEN BUILT */}
                <div className="flex w-full flex-col lg:flex-row">
                    <div className="w-full flex flex-col justify-center mb-4 px-2 lg:px-8 xl:px-64 sm:mb-12">
                        <div className="w-full mx-auto">
                            <h3 className="text-3xl font-semibold text-center lg:text-left text-gray-900">Team has been built</h3>
                            <p className="text-lg font-medium text-gray-800">After team building will be finished, you will get all the details to contact your teammates. Soon project details will be sent to all of you!</p>
                        </div>
                    </div>
                    <div className="w-full">
                        <div className="px-2 lg:px-0 hiw-image-bg hiw-rounded-l -ml-2 lg:ml-0 flex justify-center lg:justify-start items-center">
                            <img src={HIW2Img} alt="" className="xl:-ml-8"/>
                        </div>
                    </div>
                </div>

                {/* IT STARTS WITH YOU */}
                <div className="flex w-full flex-col lg:flex-row mb-8 xl:mb-32">
                    <div className="w-full order-2 lg:order-1">
                        <div className="px-2 lg:px-0 hiw-image-bg hiw-rounded-r -ml-2 lg:ml-0 flex justify-center lg:justify-end items-center">
                            <img src={HIW3Img} alt="" className="xl:-mr-8"/>
                        </div>
                    </div>
                    <div className="order-1 lg:order-2 w-full flex flex-col justify-center mb-4 px-2 lg:px-8 xl:px-64 sm:mb-12">
                        <div className="w-full mx-auto">
                            <h3 className="text-3xl font-semibold text-center lg:text-left text-gray-900">Working together</h3>
                            <p className="text-lg font-medium text-gray-800">Your team will receive details about project and it will be up to all of you on how to make it real.</p>
                        </div>
                    </div>
                </div>

                {/* COMPETING AGAINS OTHERS */}
                <div className="flex w-full flex-col lg:flex-row">
                    <div className="w-full flex flex-col justify-center mb-4 px-2 lg:px-8 xl:px-64 sm:mb-12">
                        <div className="w-full mx-auto">
                            <h3 className="text-3xl font-semibold text-center lg:text-left text-gray-900">Competing against others</h3>
                            <p className="text-lg font-medium text-gray-800">All teams will be making same project, but it will be up to them on how to make it. Our senior developers will be reviewing and scoring teams on code quality, complexity and other markers.</p>
                        </div>
                    </div>
                    <div className="w-full">
                        <div className="px-2 lg:px-0 hiw-image-bg hiw-rounded-l -ml-2 lg:ml-0 flex justify-center lg:justify-start items-center">
                            <img src={HIW4Img} alt="" className="xl:-ml-8"/>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    );
}

export default HomePage;