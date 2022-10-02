import React from "react";
import Container from "@mui/material/Container";
import Box from "@mui/material/Box";

import Header from "../../Components/Header";

const FailedVerifyToken: React.FC = () => {
  return (
    <>
      <Header />
      <Container>
        <h1>無効なトークンです</h1>
        <h3>
          {"トークンの有効期限が切れています。最初からやり直してください"}
        </h3>
      </Container>
    </>
  );
};

export default FailedVerifyToken;
