import * as React from "react";
import Avatar from "@mui/material/Avatar";
import Button from "@mui/material/Button";
import CssBaseline from "@mui/material/CssBaseline";
import TextField from "@mui/material/TextField";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";
import Link from "@mui/material/Link";
import Grid from "@mui/material/Grid";
import Box from "@mui/material/Box";
import LockOutlinedIcon from "@mui/icons-material/LockOutlined";
import Typography from "@mui/material/Typography";
import Container from "@mui/material/Container";
import { createTheme, ThemeProvider } from "@mui/material/styles";

// axios
import axios from "axios";

// components
import Header from "../Components/Header";
import Copyright from "../Components/Copyright";

const theme = createTheme();

interface AuthResponse {
  id: number;
  expires_in: number;
  access_token: string;
  token_type: string;
}

export default function SignIn() {
  //
  // ログインイベント
  const postAuthorization = (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    const data = new FormData(event.currentTarget);
    const config = {
      method: "post",
      url: "http://localhost:8000/api/auth/login",
      data: {
        email: data.get("email"),
        password: data.get("password"),
      },
    };

    axios(config)
      .then((response) => {
        const res: AuthResponse = response.data;
        // console.log(res);
        window.location.href = "/Home";
      })
      .catch((error) => {
        console.log(error);
      });
  };

  return (
    <ThemeProvider theme={theme}>
      <Header />
      <Container component="main" maxWidth="xs">
        <CssBaseline />
        <Box
          sx={{
            marginTop: 8,
            display: "flex",
            flexDirection: "column",
            alignItems: "center",
          }}
        >
          <Typography component="h1" variant="h5">
            ログイン
          </Typography>
          <Box
            component="form"
            onSubmit={postAuthorization}
            noValidate
            sx={{ mt: 1 }}
          >
            <TextField
              margin="normal"
              required
              fullWidth
              id="email"
              label="メールアドレス"
              name="email"
              autoComplete="email"
              autoFocus
            />
            <TextField
              margin="normal"
              required
              fullWidth
              name="password"
              label="パスワード"
              type="password"
              id="password"
              autoComplete="current-password"
            />
            <FormControlLabel
              control={
                <Checkbox id="remember" value="remember" color="primary" />
              }
              label="Remember me"
            />
            <Grid item xs>
              <Link href="#" variant="body2">
                パスワードを忘れた方はこちら
              </Link>
            </Grid>
            <Button
              type="submit"
              fullWidth
              variant="contained"
              sx={{ mt: 3, mb: 2 }}
            >
              ログイン
            </Button>
            <Grid container>
              <Grid item>
                <Link href="/preRegister" variant="body2">
                  {"アカウント登録がお済でない方"}
                </Link>
              </Grid>
            </Grid>
          </Box>
        </Box>
        <Copyright sx={{ mt: 8, mb: 4 }} />
      </Container>
    </ThemeProvider>
  );
}
