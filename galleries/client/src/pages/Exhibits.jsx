import React from 'react';
import ExhibitsList from '../components/exhibits/ExhibitsList';

const Exhibits = () => {
  return (
    <div>
      <ExhibitsList paginate={true} />
    </div>
  );
};

export default Exhibits;