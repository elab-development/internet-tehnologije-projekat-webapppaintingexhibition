import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";

const firebaseConfig = {
  apiKey: import.meta.env.VITE_FIREBASE_APIKEY,
  authDomain: "envision-2e6bf.firebaseapp.com",
  projectId: "envision-2e6bf",
  storageBucket: "envision-2e6bf.appspot.com",
  messagingSenderId: "902382057563",
  appId: "1:902382057563:web:7a7a0c0e3a9e1bf73a677e",
  measurementId: "G-JJF11ZG45L"
};

export const app = initializeApp(firebaseConfig);