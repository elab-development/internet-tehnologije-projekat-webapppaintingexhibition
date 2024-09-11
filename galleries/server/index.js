import express from 'express';
import dotenv from 'dotenv';
import cors from 'cors';
import { connectDB } from './database/connectDB.js';

dotenv.config();

const port = process.env.PORT || 8000;

const app = express();
app.use(
  cors({
    origin: process.env.CLIENT_URL,
    credentials: true,
  })
);
app.use(express.json());

app.get('/api', (req, res) => {
  res.send('Server up and running');
});

app.listen(port, () => {
  connectDB();
  console.log('Server is running on port 8000');
});