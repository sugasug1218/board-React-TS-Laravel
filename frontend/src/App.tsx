import React from "react";
import logo from "./logo.svg";
import "./App.css";
import { BrowserRouter, Route, Routes } from "react-router-dom";

import Login from "./Pages/Login";
import Test from "./Pages/Test";
import PreRegister from "./Pages/PreRegister";
import Register from "./Pages/Register";
import NotFound from "./Pages/Errors/NotFound";
import FailedVerifyToken from "./Pages/Errors/FailedVerifyToken";

const App: React.FC = () => {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/Login" element={<Login />} />
        <Route path="/PreRegister" element={<PreRegister />} />
        <Route path="/register" element={<Register />} />
        <Route path="/FailedVerify" element={<FailedVerifyToken />} />
        <Route path="*" element={<NotFound />} />
      </Routes>
    </BrowserRouter>
  );
};

export default App;
