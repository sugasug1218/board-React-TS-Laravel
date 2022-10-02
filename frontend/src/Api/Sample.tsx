import React from "react";
import axios from "axios";

export const ApiGet_Sample = (url: any) => {
  axios
    .get(url)
    .then((result) => {
      console.log(result);
    })
    .catch((error) => {
      console.log(error);
    });
};
