import React from "react";
import { useEffect, useState } from "react";

type AuthInfo = {
  userId: string;
  email: string;
  accessToken: string;
};

export const LoggedInContext = React.createContext<boolean>(false);

export const AuthInfoContext = React.createContext<
  [AuthInfo, React.Dispatch<React.SetStateAction<AuthInfo>>]
>([
  {
    userId: "",
    email: "",
    accessToken: "",
  },
  () => {},
]);
