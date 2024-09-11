import React, { useEffect } from 'react';
import { BrowserRouter, Route, Routes } from 'react-router-dom';

import { useAuthStore } from './store/authStore';
import LoadingSpinner from './components/shared/LoadingSpinner';
import RedirectAuthenticatedUser from './components/auth/RedirectAuthenticatedUser';
import ProtectedRoute from './components/auth/ProtectedRoute';
import AuthLayout from './components/auth/AuthLayout';
import ProtectedLayout from './components/auth/ProtectedLayout';
import Home from './pages/Home';
import SignUp from './pages/auth/SignUp';
import Login from './pages/auth/Login';
import VerifyEmail from './pages/auth/VerifyEmail';
import ForgotPassword from './pages/auth/ForgotPassword';
import ResetPassword from './pages/auth/ResetPassword';
import About from './pages/About';
import Exhibits from './pages/Exhibits';

const App = () => {
  const { isCheckingAuth, checkAuth } = useAuthStore();

  useEffect(() => {
    checkAuth();
  }, [checkAuth]);

  if (isCheckingAuth) {
    return <LoadingSpinner />;
  }

  return (
    <BrowserRouter>
      <Routes>
        {/* PUBLIC PAGES START */}
        <Route
          path='/'
          element={
            <>
              <ProtectedLayout>
                <Home />
              </ProtectedLayout>
            </>
          }
        />
        {/* PUBLIC PAGES END */}

        {/* AUTH PAGES START */}
        <Route
          path='/signup'
          element={
            <RedirectAuthenticatedUser>
              <AuthLayout>
                <SignUp />
              </AuthLayout>
            </RedirectAuthenticatedUser>
          }
        />
        <Route
          path='/login'
          element={
            <RedirectAuthenticatedUser>
              <AuthLayout>
                <Login />
              </AuthLayout>
            </RedirectAuthenticatedUser>
          }
        />
        <Route
          path='/verify-email/:email'
          element={
            <RedirectAuthenticatedUser>
              <AuthLayout>
                <VerifyEmail />
              </AuthLayout>
            </RedirectAuthenticatedUser>
          }
        />
        <Route
          path='/forgot-password'
          element={
            <RedirectAuthenticatedUser>
              <AuthLayout>
                <ForgotPassword />
              </AuthLayout>
            </RedirectAuthenticatedUser>
          }
        />
        <Route
          path='/reset-password/:token/:email'
          element={
            <RedirectAuthenticatedUser>
              <AuthLayout>
                <ResetPassword />
              </AuthLayout>
            </RedirectAuthenticatedUser>
          }
        />
        {/* AUTH PAGES END */}

        {/* PRIVATE PAGES START */}
        <Route
          path='/about'
          element={
            <ProtectedRoute>
              <ProtectedLayout>
                <About />
              </ProtectedLayout>
            </ProtectedRoute>
          }
        />
        <Route
          path='/exhibits'
          element={
            <ProtectedRoute>
              <ProtectedLayout>
                <Exhibits />
              </ProtectedLayout>
            </ProtectedRoute>
          }
        />
        {/* PRIVATE PAGES END */}
      </Routes>
    </BrowserRouter>
  );
};

export default App;
