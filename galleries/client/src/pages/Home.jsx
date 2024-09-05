import React, { useEffect } from 'react';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Hero from '../components/home/Hero';
import ExhibitsList from '../components/exhibits/ExhibitsList';
import TopExhibits from '../components/exhibits/TopExhibits';

const Home = () => {
  useEffect(() => {
    AOS.init({
      offset: 100,
      duration: 800,
      easing: 'ease-in-sine',
      delay: 100,
    });
    AOS.refresh();
  }, []);

  return (
    <div>
      <Hero />
      <ExhibitsList
        overhead='Stay in the Loop'
        heading='Upcoming Exhibits'
        paragraph='Explore the most popular upcoming exhibits and attend some'
        limit={5}
      />
      <TopExhibits />
    </div>
  );
};

export default Home;