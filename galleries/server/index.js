import express from 'express';
import dotenv from 'dotenv';
import cookieParser from 'cookie-parser';
import cors from 'cors';
import { connectDB } from './database/connectDB.js';
import authRoutes from './routes/auth.route.js';
import categoryRoutes from './routes/category.route.js';

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
app.use(cookieParser());

app.get('/api', (req, res) => {
  res.send('Server up and running');
});

app.use('/api/auth', authRoutes);
app.use('/api/categories', categoryRoutes);

app.listen(port, () => {
  connectDB();
  console.log('Server is running on port 8000');
});