import React, { useEffect, useState } from 'react';
import { initialExhibits } from '../../utils/data';
import { useSearchTerm } from '../../hooks/useSearchTerm.hook';

const ExhibitsList = ({
  overhead,
  heading,
  paragraph,
  limit,
  paginate = false,
}) => {
  const pageSize = limit ? limit : 10;
  const [filteredExhibits, setFilteredExhibits] = useState(initialExhibits);
  const [currentPage, setCurrentPage] = useState(1);
  const [totalPages, setTotalPages] = useState(1);
  const searchTerm = useSearchTerm();

  const changePage = (newPage) => {
    setCurrentPage(newPage);
  };

  useEffect(() => {
    if (paginate && searchTerm) {
      let filteredArray = initialExhibits.filter(
        (exhibit) =>
          exhibit.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
          exhibit.artist.toLowerCase().includes(searchTerm.toLowerCase()) ||
          exhibit.category.toLowerCase().includes(searchTerm.toLowerCase())
      );
      setFilteredExhibits(filteredArray);
    }
  }, [searchTerm]);

  useEffect(() => {
    setTotalPages(Math.ceil(filteredExhibits.length / pageSize));
    setCurrentPage(1);
  }, [filteredExhibits]);


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
            {filteredExhibits?.length === 0 && <div>No results</div>}

            {filteredExhibits.slice(currentPage*pageSize-pageSize, currentPage*pageSize).map((exhibit,idx) => (
              <div
                data-aos = 'fade-up'
                data-aos-delay = {exhibit.delay}
                key = {idx}
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

        {paginate && (
          <div className='flex items-center justify-center gap-4 mt-10'>
            {Array(totalPages)
              .fill()
              .map((_, idx) => (
                <div
                  className={` text-white px-3 py-1 rounded-full cursor-pointer ${
                    currentPage === idx + 1 ? 'bg-orange-700' : 'bg-primary'
                  } hover:bg-orange-600`}
                  key={idx}
                  onClick={() => changePage(idx + 1)}
                >
                  {idx + 1}
                </div>
              ))}
          </div>
        )}

      </div>
    </div>
  );
};

export default ExhibitsList;