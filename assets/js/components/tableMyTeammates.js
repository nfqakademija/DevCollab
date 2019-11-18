import React from "react";

const TableMyTeammates = ({ myTeammates }) => (
  <div className="w-full md:w-1/2 p-2">
    <div className="bg-white shadow-lg w-full p-2 xl:p-4">
      <h1 className="text-center text-4xl font-semibold mb-4">My team</h1>
      <div className="px-2">
        <div className="flex flex-wrap -mx-2">
          {myTeammates.length === 0 && (
            <p className="text-center mt-8">Loading...</p>
          )}
          {myTeammates.map(myTeammate => (
            <div className="w-full xl:w-1/2 px-2 my-2" key={myTeammate.id}>
              <div className="p-2 flex items-center bg-gray-100 rounded-lg">
                <div className="bg-blue-500 h-8 w-8 rounded-full flex justify-center items-center">
                  <span className="text-white text-xl font-semibold">
                    {myTeammate.name[0]}
                  </span>
                </div>
                <div className="ml-2 text-left text-lg font-semibold">
                  <p>{myTeammate.name}</p>
                  <p className="text-xs text-gray-600 font-medium">
                    {myTeammate.email}
                  </p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  </div>
);

export default TableMyTeammates;
