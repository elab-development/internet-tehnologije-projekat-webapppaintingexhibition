import axios from 'axios';

const getAuthToken = async () => {
  const res = await axios.post(
    `https://api.artsy.net/api/tokens/xapp_token?client_id=${
      import.meta.env.VITE_ARTSY_CLIENT_ID
    }&client_secret=${import.meta.env.VITE_ARTSY_CLIENT_SECRET}`
  );

  return res.data.token;
};

export const getArtworks = async () => {
  const token = await getAuthToken();
  const res = await axios.get('https://api.artsy.net/api/artworks', {
    headers: {
      'X-Xapp-Token': token,
    },
  });
  return res.data._embedded.artworks;
};