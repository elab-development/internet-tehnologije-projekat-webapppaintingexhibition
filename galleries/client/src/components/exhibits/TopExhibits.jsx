import React from 'react';
import { FaStar } from 'react-icons/fa6';

import { initialExhibits } from '../../utils/data';

const TopExhibits = () => {
  return (
    <div className='mt-14 mb-12' data-aos='fade-up'>
      <div className='container'>
        <div className='text-center mb-28'>
          <p data-aos='fade-up' className='text-sm text-primary font-semibold'>
            Top Rated Exhibits for you
          </p>
          <h1 data-aos='fade-up' className='text-3xl font-bold'>
            Best Exhibits Next Month
          </h1>
          <p data-aos='fade-up' className='text-xs text-gray-400'>
            Explore the most popular exhibits and attend some this month
          </p>
        </div>

        <div className='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-20 md:gap-5 place-items-center'>
          {initialExhibits.slice(7, 10).map((exhibit, idx) => (
            <div
              key={idx}
              className='w-[210px] rounded-xl bg-white hover:bg-black/80 hover:text-white relative shadow-xl duration-300 group max-w-[300px]'
            >
              <div className='h-[150px] flex justify-center'>
                <img
                  src={exhibit.image}
                  alt={exhibit.title}
                  className='h-[220px] w-[140px] object-cover rounded-xl transofrm -translate-y-20 group-hover:scale-105 duration-300 drop-shadow-md'
                />
              </div>
              <div className='p-4 text-center'>
                <div className='w-full flex items-center justify-center gap-1'>
                  <FaStar className='text-yellow-500' />
                  <FaStar className='text-yellow-500' />
                  <FaStar className='text-yellow-500' />
                  <FaStar className='text-yellow-500' />
                  <FaStar className='text-yellow-500' />
                </div>
                <h1 className='text-xl font-bold line-clamp-1'>
                  {exhibit.title}
                </h1>
                <p className='text-gray-600 group-hover:text-white duration-300 text-sm line-clamp-2'>
                  {exhibit.artist}
                </p>
                <div className='flex justify-between text-gray-400 px-3'>
                  <p className='text-xs italic'>{exhibit.category}</p>
                  <p className='text-xs'>
                    {new Date(exhibit.date).toLocaleDateString()}
                  </p>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default TopExhibits;