import React, { useState } from 'react';
import { initialExhibits } from '../../utils/data';

const ExhibitsList = ({ overhead, heading, paragraph, limit }) => {
  const pageSize = limit ? limit : 8;

  return (
    <div className='mt-14 mb-12'>
      <div className='container'>
        <div className='text-center mb-10 max-w-[600px] mx-auto'>
          <p data-aos='fade-up' className='text-sm text-primary font-semibold'>
            {overhead}
          </p>
          <h1 data-aos='fade-up' className='text-3xl font-bold'>
            {heading}
          </h1>
          <p data-aos='fade-up' className='text-xs text-gray-400'>
            {paragraph}
          </p>
        </div>

        <div>
          <div className='grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 place-items-center gap-5'>
            {initialExhibits.slice(0, pageSize).map((exhibit, idx) => (
              <div
                data-aos='fade-up'
                data-aos-delay={exhibit.delay}
                key={idx}
                className='space-y-3'
              >
                <img
                  src={exhibit.image}
                  alt={exhibit.title}
                  className='h-[220px] w-[150px] object-cover rounded-md'
                />
                <div className='w-[150px]'>
                  <h3 className='font-semibold line-clamp-1'>
                    {exhibit.title}
                  </h3>
                  <p className='text-sm text-gray-600'>{exhibit.artist}</p>
                  <div className='flex justify-between text-gray-400'>
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
    </div>
  );
};

export default ExhibitsList;