import React, { useState } from 'react';
import { Link, NavLink, useNavigate } from 'react-router-dom';
import { IoMdSearch } from 'react-icons/io';

import Logo from '../../assets/logo.png';
import { menuLinks } from '../../utils/navbarLinks';

const Navbar = () => {

  const [searchTerm, setSearchTerm] = useState('');
  const navigate = useNavigate();

  return (
    <div className='shadow-md duration-200 relative z-40'>
      <div className='bg-primary py-2'>
        <div className='container flex justify-between items-center'>
          <div>
            <Link to='/' className='font-bold text-2xl text-white sm:text-3xl flex items-center gap-2'>
              <img src={Logo} alt='logo' className='w-10' />
              Envision
            </Link>
          </div>
          <div className='flex justify-between items-center gap-4'>
            <div className='relative group hidden sm:block'>
              <input
                type='text'
                placeholder='Search'
                className='w-[200px] sm:w-[200px] group-hover:w-[300px] transition-all duration-300 rounded-full border border-gray-300 px-2 py-1 focus:outline-none focus:border-1 focus:border-primary'
                value = {searchTerm}
                onChange={(e) => setSearchTerm(e.target.value)}
              />
              <IoMdSearch 
                onClick={()=>navigate(`/exhibits?search=${searchTerm}`)}
                className='text-gray-500 group-hover:text-primary absolute top-1/2 -translate-y-1/2 right-3' 
                />
                
            </div>
          </div>
        </div>
      </div>
      <div></div>

      <div className='flex justify-center bg-white'>
        <ul className='sm:flex hidden items-center gap-4'>
          {menuLinks.map((item, idx) => (
            <li key={idx}>
              <NavLink
                to={item.link}
                className='inline-block px-4 py-2 hover:text-primary duration-200'
              >
                {item.name}
              </NavLink>
            </li>
          ))}
        </ul>
      </div>

    </div>
  );
};

export default Navbar;