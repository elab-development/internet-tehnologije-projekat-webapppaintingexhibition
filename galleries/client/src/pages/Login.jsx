import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';

const Login = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleSubmit = (e) => {
    e.preventDefault();

    if (username.trim() === '') {
      toast.error('Username is required!');
      return;
    }
    if (password.trim() === '') {
      toast.error('Password is required!');
      return;
    }

    localStorage.setItem('username', username);
    navigate('/');
  };

  return (
    <div className='flex justify-center items-center h-[80vh]'>
      <div className='w-96 p-6 shadow-lg bg-white rounded-md'>
        <h1 className='text-3xl block text-center font-semibold'>Sign In</h1>
        <hr className='mt-3' />
        <form onSubmit={handleSubmit}>
          <div className='mt-3'>
            <label htmlFor='username' className='block text-base mb-2'>
              Username
            </label>
            <input
              type='text'
              className='border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600'
              placeholder='Enter Username...'
              value={username}
              onChange={(e) => setUsername(e.target.value)}
            />
          </div>
          <div className='mt-3'>
            <label htmlFor='password' className='block text-base mb-2'>
              Password
            </label>
            <input
              type='password'
              className='border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600'
              placeholder='Enter Password...'
              value={password}
              onChange={(e) => setPassword(e.target.value)}
            />
          </div>
          <div className='mt-3 flex justify-between items-center'>
            <div className='flex gap-1 items-center'>
              <input type='checkbox' />
              <label>Remember Me</label>
            </div>
            <div>
              <a href='#' className='text-orange-500 font-semibold'>
                Forgot Password?
              </a>
            </div>
          </div>
          <div className='mt-5'>
            <button
              type='submit'
              className='border-2 border-orange-500 bg-orange-500 text-white py-1 w-full rounded-md hover:bg-transparent hover:text-orange-700 font-semibold'
            >
              Sign In
            </button>
          </div>
        </form>
      </div>
      <ToastContainer />
    </div>
  );
};

export default Login;