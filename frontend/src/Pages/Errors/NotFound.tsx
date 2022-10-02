import React from "react";
import Container from "@mui/material/Container";
import Box from "@mui/material/Box";

import Header from "../../Components/Header";

const NotFound: React.FC = () => {
  return (
    <>
      <Header />
      <Container>
        <h1>404 Not Found</h1>
        <h3>お探しのページは見つかりませんでした</h3>
      </Container>
    </>
  );
};

export default NotFound;
