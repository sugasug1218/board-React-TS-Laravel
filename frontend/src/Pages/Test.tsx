import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";

import Box from "@mui/material/Box";
import FromGroup from "@mui/material/FormGroup";
import FormControlLabel from "@mui/material/FormControlLabel";
import Switch from "@mui/material/Switch";

// import Container from "@mui/material/Container";
// import AppBar from "@mui/material/AppBar";

const Test = () => {
  //
  const [auth, setAuth] = useState(true);
  //   const [anchorEl, setAnchorEl] = React.useState<null | HTMLElement>(null);
  const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    setAuth(event.target.checked);
  };

  return (
    <Box sx={{ flexGrow: 1 }}>
      <FromGroup>
        <FormControlLabel
          control={
            <Switch
              checked={auth}
              onChange={handleChange}
              aria-label="login switch"
            />
          }
          label={auth ? "ログイン中" : "未ログイン"}
        />
      </FromGroup>
    </Box>
  );
};

export default Test;
